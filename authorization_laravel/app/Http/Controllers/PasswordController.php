<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Password;
use Illuminate\Http\Request;
use App\Http\Requests\Password\StoreRequest;
use App\Http\Requests\Password\UpdateRequest;
use App\Notifications\Password\ConfirmNotification;
use Auth;

class PasswordController extends Controller
{

    public function store(StoreRequest $request)
    {
        $ip = $request->ip();
        $email = $request->input('email');
        //compact() пишем для создание массива или надо было указывать ->where('email', $email)
        $user = User::query()
                ->where(compact('email'))
                ->first();

        $password = Password::query()
            ->create(compact('ip' , 'email') + ['user_id' => $user?->id]);

        //ConfirmNotification - наш клас нотификации
        $user?->notify(new ConfirmNotification($password));


       return to_route('password.confirm');
    }

    public function edit(Password $password)
    {

        abort_unless($password->user_id, 404);

        return view('password.edit', compact('password'));
    }


    public function update(UpdateRequest $request, Password $password)
    {

        abort_unless($password->user_id, 404);

        /** @var User */
        $user = $password->user;

        $user->updatePassword($request->input('password'));

        Auth::login($user);

        return to_route('user');
    }
}
