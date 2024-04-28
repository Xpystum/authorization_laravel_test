<?php

namespace App\Console\Commands\Email;

use App\Enums\Email\EmailStatusEnum;
use App\Models\Email;
use Illuminate\Console\Command;

class ExpireEmailConfrimationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда для просрочки status email -> подтвреждение email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->warn('Просрачивание =) email status...');

        $this->expireEmail();

        $this->info('email status просрачены =).');
    }

    private function expireEmail(): void
    {
        Email::query()
            ->where('status', EmailStatusEnum::pending)
            ->where('created_at', '<=' , now()->subWeek())
            ->update(['status' => EmailStatusEnum::expired]);
    }
}
