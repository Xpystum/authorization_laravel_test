<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\User\SettingsController;

use App\Http\Controllers\User\Settings\ProfileController;
use App\Http\Controllers\User\Settings\PasswordController as UserPasswordController;

use App\Http\Controllers\PasswordController;
use App\Models\User;
use App\Notifications\Password\ConfirmNotification;

Route::redirect('/', '/registration');


Route::middleware('guest')->group(function () {

    //регистрация
        Route::view('/registration', 'registration.index')->name('registration');
        Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

    //вход
        Route::view('/login', 'login.index')->name('login');
        Route::post('/login', [LoginController::class, 'store'])->name('login.store');


    //восстановление пароля
        //ввести email
        Route::view('/password', 'password.index')->name('password');
        //отправка и поиск email
        Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
        //страничка сообщение о переходе по ссылке из почты
        Route::view('/password/confirm', 'password.confirm')->name('password.confirm');
        //переход по ссылке из почты на страничку с уникальынм code и изменение пароля
        Route::view('/password/{code}', 'password.edit')->name('password.edit');
        //отправляем пароль и сохраняем для юзера
        Route::post('/password/{code}', [PasswordController::class, 'update'])->name('password.update');

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


    //изменение пароля
    Route::get('/settings/password', [UserPasswordController::class, 'edit'])->name('user.settings.password.edit');
    Route::post('/settings/password', [UserPasswordController::class, 'update'])->name('user.settings.password.update');

    Route::get('/test', fn () => 'Test');

});


Route::get('/test', function () {
    return (new ConfirmNotification)
        ->toMail(User::query()->first());
});




