<?php

namespace App\Notifications\Email;

use App\Models\Email;
use App\Models\Password;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private bool $withLink = true;

    public function __construct(

        private Email $email,

    ) { }

    public function via(User $notifiable): array
    {
        return ['mail'];
    }

    public function withouLink() : self
    {
        $this->withLink = false;

        return $this;
    }

    public function toMail(User $notifiable): MailMessage
    {


        $message = (new MailMessage)
                    ->subject('Подтверждение почты')
                    ->greeting('Здравствуйте!')
                    ->line("Введите код подтверждения: {$this->email->code}" );


        if($this->withLink)
        {
            //опасно для безопасности
            // $url = route('password.edit', 123);

            //делается для безопаности, что бы хаскер* не смог подменить домен
            $url = app_url("email/{$this->email->uuid}/confirm?code={$this->email->code}");

            $message->line('Или нажмите на кнопку ниже:')
            ->action('Подтрведить почту', $url);
        }

        return $message;

    }
}
