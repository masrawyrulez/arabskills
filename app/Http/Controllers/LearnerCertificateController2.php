<?php


namespace App\Http\Controllers;

use App\Models\Learner2;

class LearnerCertificateController2 extends Controller
{
    public function show($code)
    {
        $learner = Learner2::where('Learner_Code', $code)->firstOrFail();
        return view('learner3', compact('learner'));
    }
}
