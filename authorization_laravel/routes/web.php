<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\User\SettingsController;

use App\Http\Controllers\User\Settings\ProfileController;
use App\Http\Controllers\User\Settings\PasswordController as UserPasswordController;

use App\Http\Controllers\PasswordController;
use App\Models\Email;
use App\Models\User;
use App\Notifications\Email\ConfirmEmailNotification;

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
        Route::get('/password/{password:uuid}', [PasswordController::class, 'edit'])->name('password.edit')->whereUuid('password');
        //отправляем пароль и сохраняем для юзера
        Route::post('/password/{password:uuid}', [PasswordController::class, 'update'])->name('password.update')->whereUuid('password');

});

// ->whereUuid('email') - проверять, или будет ошибка как с паролям выше*
Route::get('/email/confirmation', [EmailController::class, 'confirmation'])->name('email.confirmation');
Route::post('/email/confirmation/send', [EmailController::class, 'send'])->name('email.confirmation.send');
Route::get('/email/{email:uuid}', [EmailController::class, 'link'])->name('email.confirmation.link')->whereUuid('email');




//группа (кабинет пользователь)
    //'emailConfirmation' - можно вешать не на весь кабинет, а не нкоторые url
Route::middleware('auth', 'online', /** 'emailConfirmation' */)->prefix('user')->group(function () {

    //выход
    Route::post('/logout', [LogoutController::class, 'logout'])->name('user.logout');

    //профиль user
    Route::redirect('/', 'user/settings')->name('user');
    Route::get('/settings', [SettingsController::class, 'index'])->name('user.settings');

    //редактирование профиля
        //'emailConfirmation'- что бы редактировать нужно пройти проверку почты
    Route::middleware('emailConfirmation')->group(function(){

        Route::get('/settings/profile', [ProfileController::class, 'edit'])->name('user.settings.profile.edit');
        Route::post('/settings/profile', [ProfileController::class, 'update'])->name('user.settings.profile.update');

    });



    //изменение пароля
    Route::get('/settings/password', [UserPasswordController::class, 'edit'])->name('user.settings.password.edit');
    Route::post('/settings/password', [UserPasswordController::class, 'update'])->name('user.settings.password.update');

    Route::get('/test', fn () => 'Test');

});


// Route::get('/test', function () {
//     return (new ConfirmEmailNotification(Email::query()->first()))
//         ->toMail(User::query()->first());
// });




