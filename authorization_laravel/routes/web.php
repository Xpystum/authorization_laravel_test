<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::view('/registration', 'registration.index')->name('registration');

Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');


Route::view('/login', 'login.index')->name('login');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');



