<?php

// namespace App\Http\Controllers;

// use App\Models\Learner;
// use Illuminate\Http\Request;

// class LearnerController extends Controller
// {
//     // public function index()
//     // {
//     //     $learners = Learner::all();
//     //     return view('learners.index', compact('learners'));
//     // }

//     // public function create()
//     // {
//     //     return view('learners.create');
//     // }

//   public function store(Request $request)
// {
//     $request->validate([
//         'learner_code' => 'required|unique:learners',
//         'learner_name' => 'required',
//         'image_name' => 'required',
//     ]);

//     return redirect()->route('learners.index')->with('success', 'Learner added successfully!');
// }


//     public function show(Learner $learner)
//     {
//         return view('learners.show', compact('learner'));
//     }

//     // public function edit(Learner $learner)
//     // {
//     //     return view('learners.edit', compact('learner'));
//     // }

//     // public function update(Request $request, Learner $learner)
//     // {
//     //     $request->validate([
//     //         'learner_name' => 'required',
//     //         'training_name' => 'required',
//     //         'client' => 'required',
//     //         'guided_learning_hours' => 'required|integer',
//     //         'grade' => 'required',
//     //     ]);

//     //     $learner->update($request->all());
//     //     return redirect()->route('learners.index')->with('success', 'Learner updated successfully!');
//     // }

//     // public function destroy(Learner $learner)
//     // {
//     //     $learner->delete();
//     //     return redirect()->route('learners.index')->with('success', 'Learner deleted successfully!');
//     // }
// }

namespace App\Http\Controllers;

use App\Models\Learner;

class LearnerCertificateController extends Controller
{
    public function show($code)
    {
        $learner = Learner::where('learner_code', $code)->firstOrFail();
        return view('learner', compact('learner'));
    }
}
