<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\User\Settings\ProfileController;
use App\Http\Controllers\User\SettingsController;

use Illuminate\Support\Facades\Route;


Route::redirect('/', '/registration');


Route::middleware('guest')->group(function () {

    //регистрация
    Route::view('/registration', 'registration.index')->name('registration');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

    //вход
    Route::view('/login', 'login.index')->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

});



//группа (кабинет пользователь)
Route::middleware('auth', 'online')->prefix('user')->group(function () {

    //выход
    Route::post('/logout', [LogoutController::class, 'logout'])->name('user.logout');

    //профиль user
    Route::redirect('/', 'user/settings')->name('user');
    Route::get('/settings', [SettingsController::class, 'index'])->name('user.settings');

    //редактирование профиля
    Route::get('/settings/profile', [ProfileController::class, 'edit'])->name('user.settings.profile.edit');
    Route::post('/settings/profile', [ProfileController::class, 'update'])->name('user.settings.profile.update');

    Route::get('/test', fn () => 'Test');

});




