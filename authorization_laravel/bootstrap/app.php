<?php

use App\Http\Middleware\OnlineMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->redirectGuestsTo('/login');
        $middleware->redirectUsersTo('/user');
        $middleware->append(OnlineMiddleware::class);


        $middleware->alias(['online' => OnlineMiddleware::class]);


    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
