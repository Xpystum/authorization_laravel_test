<?php

namespace App\Providers;

use App\Events\User\UserCreatedEvent;
use App\Listeners\User\SendConfirmEmailNotificationListener;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\ServiceProvider;

//Событие
use Illuminate\Support\Facades\Event;

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

        //Событие
        // Event::listen(
        //     UserCreatedEvent::class,
        //     SendConfirmEmailNotificationListener::class,
        // );
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
