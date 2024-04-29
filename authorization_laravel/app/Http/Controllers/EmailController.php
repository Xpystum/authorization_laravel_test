<?php

namespace App\Http\Controllers;

use App\Enums\Email\EmailStatusEnum;
use App\Models\Email;
use App\Models\User;
use App\Notifications\Email\ConfirmEmailNotification;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function confirmation(Request $request)
    {

        /** @var User */
        $user = $request->user();

        if($user && $user->isEmailConfirmed()){

            return redirect()->intended('/user');

        }

        return view('email.confirmation');
    }

    public function link(Request $request, Email $email)
    {

        abort_if($email->user->isEmailConfirmed(), 404);

        abort_unless($email->status->is(EmailStatusEnum::pending), 404);

        //засорение контроллера?
        $email->user->confirmEmail();

        $email->updateStatus(EmailStatusEnum::completed);


        return redirect()->intended('/user');
    }

    public function send(Request $request)
    {
        /** @var User */
        $user = $request->user();
        //обязательно проверяем существует ли user
        abort_unless($user, 404);
        abort_if($user->isEmailConfirmed(), 404);

        #TODO почта
        //нужно делать логику на проверку expired запросов и completed или будет ошибка
        $email = Email::query()
            ->where('user_id', $user->id)
            ->where('status', EmailStatusEnum::pending)
            ->firstOrFail();


        $norification = new ConfirmEmailNotification($email);
        $user->notify($norification);

        return back();
    }
}
