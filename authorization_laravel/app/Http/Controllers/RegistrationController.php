<?php

namespace App\Http\Controllers;

use App\Events\User\UserCreatedEvent;
use App\Http\Requests\Registratrion\StoreRequest;
use App\Models\User;
use Auth;

class RegistrationController extends Controller
{
    public function store(StoreRequest $request)
    {
        dd(1);
        $data = $request->except([

            '_token',

            'agreement',

            'password_confirmation'

        ]);

        $user = User::query()->create($data);

        //Вызываем событие при создание юзера
        event(new UserCreatedEvent($user));

        Auth::login($user);

        return redirect()->intended('/user');

    }
}
