<?php

Route::get('/', function (\App\Services\TableCalculator $tableCalculator) {
    $tables = $tableCalculator->calculateForPersons(125);

    return view('welcome', compact('tables'));
});

// Route model binding
Route::get('posts/{post}', function (Post $post) {
    
});

// Catch all route
Route::all('*', function () {
    return view('welcome');
});
