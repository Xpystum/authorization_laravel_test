<?php

namespace App\Providers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->setPasswordDefault();
    }

    private function setPasswordDefault(): void
    {
        Password::defaults(function () {

            return Password::min(6)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols();

                // утекшие пароли
                // ->uncompromised();

        });
    }
}
