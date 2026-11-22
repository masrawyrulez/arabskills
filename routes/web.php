<?php
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\LearnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleSheetController;
use App\Models\Learner;
use App\Models\Learner2;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::post('/contact/send',[ContactUsController::class,'store'])->name('contact.store');
Route::resource('learners', LearnerController::class);
Route::get('/ec/{code}', [GoogleSheetController::class, 'showLearner'])->name('certificate.ec');
Route::get('/wfpc01/{code}', [GoogleSheetController::class, 'showWfp'])->name('certificate.wfp');
Route::get('/pc/{code}', [GoogleSheetController::class, 'showPc'])->name('certificate.pc');
Route::get('/sheet/sync', [GoogleSheetController::class, 'sync'])->name('sheet.sync');

Route::get('/verify/{code?}', function ($code = null, \App\Services\GoogleSheetService $sheetService) {
    $code = $code ?: request('code');
    $code = trim($code);
    if (!$code) {
        return redirect('/#verifySection');
    }
    if ($sheetService->findWfpLearner($code)) {
        return redirect('/wfpc01/' . urlencode($code));
    }
    return redirect('/ec/' . urlencode($code));
})->name('certificate.verify');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');


