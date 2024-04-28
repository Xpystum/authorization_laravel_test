<?php

namespace App\Console\Commands\Passwords;

use App\Models\Password;
use Illuminate\Console\Command;
use App\Enums\Passwords\PasswordStatusEnum;

class ExpirePasswordsCommand extends Command
{
    protected $signature = 'passwords:expire';

    protected $description = 'Команда для просрочки uuid -> восстановление пароля';

    public function handle()
    {
        $this->warn('Просрачивание =) паролей...');

        $this->expirePasswords();

        $this->info('Пароль просрачены =).');

    }

    private function expirePasswords(): void
    {
        Password::query()
            ->where('status', PasswordStatusEnum::pending)
            ->where('created_at', '<=' , now()->subHours(3))
            ->update(['status' => PasswordStatusEnum::expired]);
    }
}
