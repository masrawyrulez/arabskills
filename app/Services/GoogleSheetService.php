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
                // Pad or truncate to header count
                $padded = array_pad(array_slice($row, 0, count($header)), count($header), '');
                $rows[] = array_combine($header, array_map('trim', $padded));
            }
        }

        return $rows;
    }

    /**
     * Fetch CSV from a published Google Sheet URL with caching.
     */
    public function fetchSheet(string $url, string $cacheKey, int $ttlMinutes = 10): array
    {
        if (empty($url)) {
            return [];
        }

        return Cache::remember($cacheKey, now()->addMinutes($ttlMinutes), function () use ($url) {
            try {
                $response = Http::timeout(10)->get($url);
                if ($response->successful()) {
                    return $this->parseCsv($response->body());
                }
                Log::warning("Failed to fetch Google Sheet from {$url}: Status " . $response->status());
            } catch (\Throwable $e) {
                Log::error("Exception fetching Google Sheet: " . $e->getMessage());
            }
            return [];
        });
    }

    /**
     * Find a learner by code from Google Sheet, falling back to local database.
     */
    public function findLearner(string $code): ?object
    {
        $code = trim($code);
        $url = env('GOOGLE_SHEET_LEARNERS_CSV_URL');
        $ttl = (int) env('GOOGLE_SHEET_CACHE_MINUTES', 10);

        if (!empty($url)) {
            $rows = $this->fetchSheet($url, 'google_sheet_learners_data', $ttl);
            foreach ($rows as $row) {
                // Match learner_code (case-insensitive)
                $rowCode = $row['learner_code'] ?? $row['Learner_Code'] ?? $row['Code'] ?? $row['code'] ?? null;
                if ($rowCode && strcasecmp($rowCode, $code) === 0) {
                    return (object) [
                        'learner_code' => $rowCode,
                        'learner_name' => $row['learner_name'] ?? $row['Learner_Name'] ?? $row['Name'] ?? $row['name'] ?? '',
                        'program_name' => $row['program_name'] ?? $row['Program_Name'] ?? $row['Program'] ?? $row['program'] ?? '',
                        'client_name'  => $row['client_name'] ?? $row['Client_Name'] ?? $row['Client'] ?? $row['client'] ?? '',
                        'awarded_date' => $row['awarded_date'] ?? $row['Awarded_Date'] ?? $row['Date'] ?? $row['date'] ?? null,
                        'image_name'   => $row['image_name'] ?? $row['Image_Name'] ?? 'template1.jpg',
                    ];
                }
            }
        }

        // Fallback to local database if not found in Google Sheet
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
     * Find a WFP learner by code from Google Sheet, falling back to local database.
     */
    public function findWfpLearner(string $code): ?object
    {
        $code = trim($code);
        $url = env('GOOGLE_SHEET_WFP_CSV_URL');
        $ttl = (int) env('GOOGLE_SHEET_CACHE_MINUTES', 10);

        if (!empty($url)) {
            $rows = $this->fetchSheet($url, 'google_sheet_wfp_data', $ttl);
            foreach ($rows as $row) {
                $rowCode = $row['Learner_Code'] ?? $row['learner_code'] ?? $row['Code'] ?? null;
                if ($rowCode && strcasecmp($rowCode, $code) === 0) {
                    return (object) [
                        'Learner_Code'      => $rowCode,
                        'Learner_Name'      => $row['Learner_Name'] ?? $row['learner_name'] ?? '',
                        'Date'              => $row['Date'] ?? $row['date'] ?? '',
                        'Course_Name'       => $row['Course_Name'] ?? $row['course_name'] ?? '',
                        'Track'             => $row['Track'] ?? $row['track'] ?? '',
                        'Training_Duration' => $row['Training_Duration'] ?? $row['training_duration'] ?? '',
                        'Training_Area'     => $row['Training_Area'] ?? $row['training_area'] ?? '',
                        'مدة التدريب'       => $row['مدة التدريب'] ?? '',
                        'التدريب'           => $row['التدريب'] ?? '',
                        'التخصص'           => $row['التخصص'] ?? '',
                    ];
                }
            }
        }

        // Fallback to local database
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
     * Purge cached Google Sheet data to force immediate re-download.
     */
    public function purgeCache(): void
    {
        Cache::forget('google_sheet_learners_data');
        Cache::forget('google_sheet_wfp_data');
    }
}
