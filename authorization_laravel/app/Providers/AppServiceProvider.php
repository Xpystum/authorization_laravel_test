<?php

namespace App\Providers;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
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

        Carbon::setLocale('ru');
        CarbonImmutable::setLocale('ru');
    }

    //установка дефолт значение для Password:default()
    private function setPasswordDefault(): void
    {
        Password::defaults(function () {

            return Password::min(4)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols();

                // утекшие пароли
                // ->uncompromised();

        });
    }
}
