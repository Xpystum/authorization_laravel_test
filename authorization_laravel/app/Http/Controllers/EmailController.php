<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function confirmation(Request $request)
    {

        /** @var User */
        $user = $request->user();

        if($user && $user->isEmailConfirmed()){

            return redirect()->intended('/user');

        }

        return view('email.confirmation');
    }
}
