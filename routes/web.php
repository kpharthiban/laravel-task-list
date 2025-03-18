<?php

use Illuminate\Support\Facades\Route;

// Routings happen here

Route::get('/', function () {
    return "Main Page";
});

Route::get("/hello", function () {
    return "Hello";
})->name("hello"); // This is route naming

// Redirect URL
Route::get("/hallo", function () {
    return redirect()->route("hello"); // Redirecting using route name
});

// For value specific routes (the arguments will be cached)
Route::get("/greet/{name}", function ($name) {
    return "Hello " . $name . "!";
});

// If the route is not defined
Route::fallback(function () {
    return "Still got somewhere!";
});

// GET
// POST
// PUT
// DELETE
