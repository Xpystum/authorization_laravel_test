<?php

namespace App\Http\Controllers\User\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Settings\Password\UpdateRequest;

class PasswordController extends Controller
{
    public function edit(Request $request)
    {
        /** @var User */
        $user = $request->user();


        return view('user.settings.password.edit', [
            'user' => $user,
        ]);

    }

    public function update(UpdateRequest $request)
    {

        /** @var User */
        $user = $request->user();

        $user->updatePassword($request->input('new_password'));

        return redirect()->route('user.settings');
    }
}
