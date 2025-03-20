<?php

use App\Http\Requests\TaskRequest;
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

// Implementing Route Model Binding -> Passing Task as argument -> not necessary to use findOrFail
Route::get("/tasks/{task}/edit", function (Task $task) {
    return view("edit", [
        'task' => $task // findOrFail -> makes it easier to run fallback
    ]);
})->name("tasks.edit");

Route::get("/tasks/{task}", function (Task $task) {
    return view("show", [
        'task' => $task // findOrFail -> makes it easier to run fallback
    ]);
})->name("tasks.show");

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated()); // Is a mass assignment

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully'); // Flash message
})->name('tasks.store');

// PUT for updating
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated()); // This will update the model

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully'); // Flash message
})->name('tasks.update');

// Delete data from db/tasks
Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

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
