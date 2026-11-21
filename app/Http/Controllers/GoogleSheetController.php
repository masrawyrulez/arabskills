<?php

namespace App\Http\Controllers;

use App\Services\GoogleSheetService;
use Illuminate\Http\Request;

class GoogleSheetController extends Controller
{
    protected GoogleSheetService $sheetService;

    public function __construct(GoogleSheetService $sheetService)
    {
        $this->sheetService = $sheetService;
    }

    /**
     * Show general certificate (/ec/{code})
     */
    public function showLearner($code)
    {
        $learner = $this->sheetService->findLearner($code);

        if (!$learner) {
            return response()->view('learner_not_found', ['code' => $code], 404);
        }

        return view('learner', compact('learner'));
    }

    /**
     * Show WFP certificate (/wfpc01/{code})
     */
    public function showWfp($code)
    {
        $learner = $this->sheetService->findWfpLearner($code);

        if (!$learner) {
            return response()->view('learner_not_found', ['code' => $code], 404);
        }

        return view('learner3', compact('learner'));
    }

    /**
     * Show alternate certificate (/pc/{code})
     */
    public function showPc($code)
    {
        $learner = $this->sheetService->findLearner($code);

        if (!$learner) {
            return response()->view('learner_not_found', ['code' => $code], 404);
        }

        return view('learner2', compact('learner'));
    }

    /**
     * Force refresh the Google Sheet cache (/sheet/sync)
     */
    public function sync(Request $request)
    {
        $this->sheetService->purgeCache();

        if ($request->wantsJson()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Google Sheet cache cleared and refreshed successfully.'
            ]);
        }

        return redirect()->back()->with('success', 'Google Sheet data refreshed successfully!');
    }
}
