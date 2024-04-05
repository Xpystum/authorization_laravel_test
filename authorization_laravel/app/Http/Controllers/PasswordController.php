<?php

namespace App\Http\Controllers;

use App\Http\Requests\Password\StoreRequest;
use App\Models\User;
use App\Notifications\Password\ConfirmNotification;
use Illuminate\Http\Request;

class PasswordController extends Controller
{

    public function store(StoreRequest $request)
    {
        $email = $request->input('email');
        //compact() пишем для создание массива или надо было указывать ->where('email', $email)
        $user = User::query()
                ->where(compact('email'))
                ->first();
        //ConfirmNotification - наш клас нотификации
        $user?->notify(new ConfirmNotification);


       return to_route('password.confirm');
    }

    // public function edit(Request $request)
    // {
    //     /** @var User */
    //     $user = $request->user();


    //     return view('user.settings.password.edit', [
    //         'user' => $user,
    //     ]);

    // }

    public function update(Request $request, string $code)
    {
        dd($code);
        /** @var User */
        $user = $request->user();

        $user->updatePassword($request->input('new_password'));

        return to_route('login');
    }
}
