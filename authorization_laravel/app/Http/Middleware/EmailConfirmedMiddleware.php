<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailConfirmedMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User */
        $user = $request->user();

        if($user->isEmailConfirmed()){

            return $next($request);

        }
        //guest - перевести юзера туда куда он по началу хотел
        return redirect()->guest('/email/confirmation');
    }
}
