<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registratrion\StoreRequest;
use App\Models\User;
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

        User::query()->create($data);


        return redirect()->route('registration');

    }
}
