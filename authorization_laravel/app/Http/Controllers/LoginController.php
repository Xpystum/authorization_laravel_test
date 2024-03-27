<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\login\StoreRequest;

class LoginController extends Controller
{
    public function store(StoreRequest $request)
    {

        $data = $request->only(['email', 'password']);

        //чекбокс на запоминание пользователя
        $remember = (bool) $request->input('remember');


        //? -> два запроса к бд (если мы оставим в классе валидации поиск уникального значение по email)
        if(! Auth::attempt($data, $remember) ){

            return back()->withErrors([

                'email' => 'Не верный логин или пароль.' ,

            ])->onlyInput('email');

        }

        $request->session()->regenerate();

        return redirect()->intended('/user');

    }

    // пример
    // public function store2(StoreRequest $request)
    // {

    //     $data = $request->only(['email', 'password']);

    //     //чекбокс на запоминание пользователя
    //     $remember = (bool) $request->input('remember');

    //     $user = User::query()
    //         ->where('email', $data['email'])
    //         ->first();

    //     if(!$user){

    //         return back()->withErrors([

    //             'email' => 'Не верный логин или пароль.' ,

    //         ])->onlyInput('email');

    //     }

    //     if( Hash::check($data['password'], $user->password) ){

    //         return back()->withErrors([

    //             'email' => 'Не верный логин или пароль.' ,

    //         ])->onlyInput('email');

    //     }

    //     Auth::login($user, $remember);


    //     $request->session()->regenerate();

    //     return redirect()->route('login');

    // }
}
