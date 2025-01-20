<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.submit');
