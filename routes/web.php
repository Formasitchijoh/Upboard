<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;

Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth'); // Brings up the form
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth'); // Stores the data in the Database

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class); // Route model binding od the associated tag id to

// Grouping the routes for the Authentication
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});


Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');



