<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', function () {
    return view('valentine');
})->name('valentine');

Route::get('/envelope', function () {
    return view('envelope');
})->name('envelope');

Route::get('/letter', function () {
    return view('letter');
})->name('letter');


