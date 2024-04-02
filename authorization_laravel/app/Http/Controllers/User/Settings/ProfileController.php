<?php

namespace App\Http\Controllers\User\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function update(Request $request)
    {
        /** @var User */
        $user = $request->user();

        dd($user->toArray());
    }
}
