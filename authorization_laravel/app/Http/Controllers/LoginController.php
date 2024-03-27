<?php

namespace App\Http\Controllers;

use App\Http\Requests\login\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('login');

    }
}
