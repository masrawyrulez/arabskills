<?php

namespace App\Services;

use App\Models\Learner;
use App\Models\Learner2;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleSheetService
{
    /**
     * Resolve the active Google Sheet CSV URL from env.
     */
    public function getCsvUrl(): ?string
    {
        if ($url = env('GOOGLE_SHEET_CSV_URL')) {
            return $url;
        }

        if ($sheetId = env('GOOGLE_SHEET_ID')) {
            return "https://docs.google.com/spreadsheets/d/{$sheetId}/export?format=csv";
        }

        return null;
    }

    /**
     * Parse a CSV string into an array of associative rows.
     */
    public function parseCsv(string $csvContent): array
    {
        // Strip UTF-8 BOM if present
        $csvContent = preg_replace('/^\xEF\xBB\xBF/', '', trim($csvContent));
        $lines = preg_split('/\r\n|\r|\n/', $csvContent);

        if (empty($lines)) {
            return [];
        }

        // Parse header row
        $header = str_getcsv(array_shift($lines));
        $header = array_map(fn($col) => trim($col), $header);

        $rows = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }
            $row = str_getcsv($line);
            if (count($row) === count($header)) {
                $combined = array_combine($header, array_map('trim', $row));
                $rows[] = $combined;
            } elseif (count($row) > 0 && !empty($row[0])) {
                $padded = array_pad(array_slice($row, 0, count($header)), count($header), '');
                $rows[] = array_combine($header, array_map('trim', $padded));
            }
        }

        return $rows;
    }

    /**
     * Fetch CSV from a Google Sheet URL with real-time live support.
     */
    public function fetchSheet(string $url, string $cacheKey, int $ttlMinutes = 0, bool $forceFresh = false): array
    {
        if (empty($url)) {
            return [];
        }

        $ttl = (int) env('GOOGLE_SHEET_CACHE_MINUTES', 0);
        if ($ttl <= 0) {
            $forceFresh = true;
        }

        if ($forceFresh) {
            Cache::forget($cacheKey);
        }

        $cached = Cache::get($cacheKey);
        if ($ttl > 0 && !$forceFresh && $cached !== null && !empty($cached)) {
            return $cached;
        }

        try {
            // Append cache buster timestamp query parameter to force Google's edge CDN to return live data
            $fetchUrl = $url;
            $separator = str_contains($fetchUrl, '?') ? '&' : '?';
            $fetchUrl .= $separator . '_live=' . microtime(true);

            $response = Http::withoutVerifying()
                ->timeout(15)
                ->withHeaders(['User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'])
                ->get($fetchUrl);

            if ($response->successful()) {
                $rows = $this->parseCsv($response->body());
                if (!empty($rows)) {
                    if ($ttl > 0) {
                        Cache::put($cacheKey, $rows, now()->addMinutes($ttl));
                    }
                    return $rows;
                }
            }
            Log::warning("Failed to fetch Google Sheet from {$url}: Status " . $response->status());
        } catch (\Throwable $e) {
            Log::error("Exception fetching Google Sheet: " . $e->getMessage());
        }

        // If live fetch failed, return existing cached data if any
        return $cached ?? [];
    }

    /**
     * Get all rows from the primary configured Google Sheet in real-time.
     */
    public function getUnifiedRows(bool $forceFresh = false): array
    {
        $url = $this->getCsvUrl();
        if (!$url) {
            return [];
        }

        $ttl = (int) env('GOOGLE_SHEET_CACHE_MINUTES', 0);
        return $this->fetchSheet($url, 'google_sheet_unified_data', $ttl, $forceFresh);
    }

    /**
     * Determine certificate type: 'wfp' or 'learner'
     */
    public function determineCertificateType(string $code): string
    {
        $code = trim($code);
        $unifiedRows = $this->getUnifiedRows();

        // If not found in current cache, try fresh
        $match = $this->findInRows($unifiedRows, $code);
        if (!$match) {
            $unifiedRows = $this->getUnifiedRows(true);
            $match = $this->findInRows($unifiedRows, $code);
        }

        if ($match) {
            $link = strtolower($this->extractField($match, ['Link', 'link']));
            if (str_contains($link, 'wfpc01') || str_starts_with(strtoupper($code), 'OHF')) {
                return 'wfp';
            }
            return 'learner';
        }

        if (str_starts_with(strtoupper($code), 'OHF') || Learner2::where('Learner_Code', $code)->exists()) {
            return 'wfp';
        }

        return 'learner';
    }

    /**
     * Find a general certificate learner by code.
     */
    public function findLearner(string $code): ?object
    {
        $code = trim($code);

        // 1. Check primary unified Google Sheet (with auto-refresh if not found)
        $unifiedRows = $this->getUnifiedRows();
        $match = $this->findInRows($unifiedRows, $code);

        if (!$match) {
            // Auto-refresh: newly added row might be in the live sheet
            $unifiedRows = $this->getUnifiedRows(true);
            $match = $this->findInRows($unifiedRows, $code);
        }

        if ($match) {
            $rowCode = $this->extractField($match, ['ID', 'id', 'learner_code', 'Learner_Code', 'Code', 'code']);
            $name = $this->extractField($match, ['Name', 'name', 'Learner_Name', 'learner_name', 'الأسم', 'الاسم']);
            $client = $this->extractField($match, ['Cliente', 'client_name', 'Client_Name', 'Client', 'client']);
            $program = $this->extractField($match, ['اسم التدريب', 'Course_Name', 'course_name', 'program_name', 'Program_Name', 'Program', 'program', 'Track']);
            $date = $this->extractField($match, ['issue date', 'awarded_date', 'Awarded_Date', 'Date', 'date']);

            return (object) [
                'learner_code' => $rowCode ?: $code,
                'learner_name' => $name,
                'program_name' => $program,
                'client_name'  => $client,
                'awarded_date' => $this->normalizeDate($date),
                'image_name'   => 'template1.jpg',
            ];
        }

        // 2. Check dedicated learners sheet URL if defined
        $learnersUrl = env('GOOGLE_SHEET_LEARNERS_CSV_URL');
        if (!empty($learnersUrl)) {
            $ttl = (int) env('GOOGLE_SHEET_CACHE_MINUTES', 5);
            $rows = $this->fetchSheet($learnersUrl, 'google_sheet_learners_data', $ttl);
            $match = $this->findInRows($rows, $code);
            if ($match) {
                return (object) [
                    'learner_code' => $this->extractField($match, ['learner_code', 'Learner_Code', 'ID', 'code', 'Code']),
                    'learner_name' => $this->extractField($match, ['learner_name', 'Learner_Name', 'Name', 'name', 'الأسم']),
                    'program_name' => $this->extractField($match, ['program_name', 'Program_Name', 'اسم التدريب', 'Course_Name', 'Program']),
                    'client_name'  => $this->extractField($match, ['client_name', 'Client_Name', 'Cliente', 'Client']),
                    'awarded_date' => $this->normalizeDate($this->extractField($match, ['awarded_date', 'Awarded_Date', 'issue date', 'Date'])),
                    'image_name'   => 'template1.jpg',
                ];
            }
        }

        // 3. Fallback to local database
        $dbLearner = Learner::where('learner_code', $code)->first();
        if ($dbLearner) {
            return (object) [
                'learner_code' => $dbLearner->learner_code,
                'learner_name' => $dbLearner->learner_name,
                'program_name' => $dbLearner->program_name,
                'client_name'  => $dbLearner->client_name,
                'awarded_date' => $dbLearner->awarded_date,
                'image_name'   => $dbLearner->image_name ?? 'template1.jpg',
            ];
        }

        return null;
    }

    /**
     * Find a WFP certificate learner by code.
     */
    public function findWfpLearner(string $code): ?object
    {
        $code = trim($code);

        // 1. Check primary unified Google Sheet (with auto-refresh if not found)
        $unifiedRows = $this->getUnifiedRows();
        $match = $this->findInRows($unifiedRows, $code);

        if (!$match) {
            // Auto-refresh: newly added row might be in the live sheet
            $unifiedRows = $this->getUnifiedRows(true);
            $match = $this->findInRows($unifiedRows, $code);
        }

        if ($match) {
            $rowCode = $this->extractField($match, ['ID', 'id', 'Learner_Code', 'learner_code', 'Code', 'code']);
            $name = $this->extractField($match, ['Name', 'name', 'Learner_Name', 'learner_name', 'الأسم', 'الاسم']);
            $date = $this->extractField($match, ['issue date', 'Date', 'date', 'awarded_date']);
            $course = $this->extractField($match, ['اسم التدريب', 'Course_Name', 'course_name', 'program_name']);
            $track = $this->extractField($match, ['Track', 'track', 'التخصص']);
            $duration = $this->extractField($match, ['مدة التدريب', 'Training_Duration', 'training_duration']);
            $area = $this->extractField($match, ['Training Area', 'Training_Area', 'training_area', 'مكان التدريب']);
            $arDuration = $this->extractField($match, ['مدة التدريب']);
            $arTraining = $this->extractField($match, ['مكان التدريب', 'التدريب']);
            $arSpec = $this->extractField($match, ['التخصص']);

            return (object) [
                'Learner_Code'      => $rowCode ?: $code,
                'Learner_Name'      => $name,
                'Date'              => $this->normalizeDate($date),
                'Course_Name'       => $course,
                'Track'             => $track,
                'Training_Duration' => $duration,
                'Training_Area'     => $area,
                'مدة التدريب'       => $arDuration,
                'التدريب'           => $arTraining,
                'التخصص'           => $arSpec,
            ];
        }

        // 2. Check dedicated WFP sheet URL if defined
        $wfpUrl = env('GOOGLE_SHEET_WFP_CSV_URL');
        if (!empty($wfpUrl)) {
            $ttl = (int) env('GOOGLE_SHEET_CACHE_MINUTES', 5);
            $rows = $this->fetchSheet($wfpUrl, 'google_sheet_wfp_data', $ttl);
            $match = $this->findInRows($rows, $code);
            if ($match) {
                return (object) [
                    'Learner_Code'      => $this->extractField($match, ['Learner_Code', 'learner_code', 'ID', 'Code', 'code']),
                    'Learner_Name'      => $this->extractField($match, ['Learner_Name', 'learner_name', 'Name', 'الأسم']),
                    'Date'              => $this->normalizeDate($this->extractField($match, ['Date', 'date', 'issue date'])),
                    'Course_Name'       => $this->extractField($match, ['Course_Name', 'course_name', 'اسم التدريب']),
                    'Track'             => $this->extractField($match, ['Track', 'track', 'التخصص']),
                    'Training_Duration' => $this->extractField($match, ['Training_Duration', 'training_duration', 'مدة التدريب']),
                    'Training_Area'     => $this->extractField($match, ['Training_Area', 'training_area', 'Training Area', 'مكان التدريب']),
                    'مدة التدريب'       => $this->extractField($match, ['مدة التدريب']),
                    'التدريب'           => $this->extractField($match, ['التدريب', 'مكان التدريب']),
                    'التخصص'           => $this->extractField($match, ['التخصص']),
                ];
            }
        }

        // 3. Fallback to local database
        $dbWfp = Learner2::where('Learner_Code', $code)->first();
        if ($dbWfp) {
            return (object) [
                'Learner_Code'      => $dbWfp->Learner_Code,
                'Learner_Name'      => $dbWfp->Learner_Name,
                'Date'              => $dbWfp->Date,
                'Course_Name'       => $dbWfp->Course_Name,
                'Track'             => $dbWfp->Track,
                'Training_Duration' => $dbWfp->Training_Duration,
                'Training_Area'     => $dbWfp->Training_Area,
                'مدة التدريب'       => $dbWfp->{'مدة التدريب'} ?? '',
                'التدريب'           => $dbWfp->{'التدريب'} ?? '',
                'التخصص'           => $dbWfp->{'التخصص'} ?? '',
            ];
        }

        return null;
    }

    /**
     * Helper to find a row matching a code.
     */
    private function findInRows(array $rows, string $code): ?array
    {
        foreach ($rows as $row) {
            $rowCode = $this->extractField($row, ['ID', 'id', 'learner_code', 'Learner_Code', 'Code', 'code']);
            if ($rowCode && strcasecmp($rowCode, $code) === 0) {
                return $row;
            }
        }
        return null;
    }

    /**
     * Purge cached Google Sheet data to force immediate re-download.
     */
    public function purgeCache(): void
    {
        Cache::forget('google_sheet_unified_data');
        Cache::forget('google_sheet_learners_data');
        Cache::forget('google_sheet_wfp_data');
    }

    /**
     * Extract first matching key from an associative array.
     */
    private function extractField(array $row, array $keys): string
    {
        foreach ($keys as $k) {
            if (isset($row[$k]) && trim($row[$k]) !== '') {
                return trim($row[$k]);
            }
        }
        return '';
    }

    /**
     * Normalize date string for display (e.g. 08.2.2026 -> 08.02.2026 or Y-m-d).
     */
    private function normalizeDate(?string $date): string
    {
        if (empty($date)) {
            return '';
        }
        $clean = trim($date);
        try {
            return \Carbon\Carbon::parse(str_replace('.', '-', $clean))->format('d.m.Y');
        } catch (\Throwable $e) {
            return $clean;
        }
    }
}
