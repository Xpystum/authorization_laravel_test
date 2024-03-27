<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = 'users:create';

    protected $description = 'Создание User';

    public function handle()
    {
        $user = new User();

        $user->login = $this->ask("Установите login User", 'test');

        $user->email = $this->ask("Установите email User", 'test@gmail.com');

        $user->password = $this->ask("Установите email User", 'Pas123!');

        $user->save();

        $this->info('Пользователь создан');

    }
}
