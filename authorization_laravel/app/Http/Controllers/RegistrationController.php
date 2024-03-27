<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registratrion\StoreRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(StoreRequest $request)
    {

        $data = $request->except([

            '_token',

            'agreement',

            'password_confirmation'

        ]);

        $user = User::query()->create($data);

        Auth::login($user);

        return redirect()->intended('/user');

    }
}
