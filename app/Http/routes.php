<?php

use App\Emploi;
use Illuminate\Http\Request;

/**
 * Display All Tasks
 */

Route::get('/emplois', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('pages/emploi/emplois', [
        'tasks' => $tasks
    ]);
});

/**
 * Add A New Task
 */
Route::get('/emplois', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    // Create The Task...
    $task = new Emploi;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Delete An Existing Task
 */

Route::delete('/emplois/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});
