<?php

namespace App\Http\Controllers\User\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Settings\Profile\UpdateRequest;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        /** @var User */
        $user = $request->user();


        return view('user.settings.profile.edit', [
            'user' => $user,
        ]);

    }

    public function update(UpdateRequest $request)
    {
        /** @var User */
        $user = $request->user();

        $data = $request->only([

            'login',

            'gender',

        ]);

        $user->update($data);

        return redirect()->route('user.settings');
    }
}
