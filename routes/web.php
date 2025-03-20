<?php

use App\Models\Task;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Routings happen here
Route::get("/", function () {
    return redirect()->route("tasks.index");
});

Route::get('/tasks', function () {
    return view("index", [
        "tasks" => Task::latest()->get() // Executing Query (getting latest entries)
    ]); // Refers to Blade templates in /resources/views
})->name("tasks.index");

// Router order MATTERS!!!
Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get("/tasks/{id}", function ($id) {
    return view("show", [
        'task' => \App\Models\Task::findOrFail($id) // findOrFail -> makes it easier to run fallback
    ]);
})->name("tasks.show");

Route::post('/tasks', function (Request $request) {
    // Data validation for user input
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    // Storing data in db using model
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save(); // Saving the data into db

    return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.store');

// Route::get("/hello", function () {
//     return "Hello";
// })->name("hello"); // This is route naming

// // Redirect URL
// Route::get("/hallo", function () {
//     return redirect()->route("hello"); // Redirecting using route name
// });

// // For value specific routes (the arguments will be cached)
// Route::get("/greet/{name}", function ($name) {
//     return "Hello " . $name . "!";
// });

// If the route is not defined
Route::fallback(function () {
    return "Still got somewhere!";
});

// GET
// POST
// PUT
// DELETE
