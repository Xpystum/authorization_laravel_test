<?php

use App\Console\Commands\Passwords\ExpirePasswordsCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


//обновление статусов заявок на сброс пароля - everyTwoHours() - каждые 2 часа
Schedule::command(ExpirePasswordsCommand::class)->everyTwoHours(); // настройть крон на сервере для запуска команды
