<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



/**
 *
 *
 * @property int $id
 * @property string $login
 * @property string $email
 * @property mixed $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $remember_token
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $online_at
 * @property \Illuminate\Support\Carbon|null $email_confirmed_at
 * @property GenderEnum|null $gender
 * @property \Illuminate\Support\Carbon|null $password_at
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOnlineAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login',
        'email',
        'email_confirmed_at',
        'gender',
        'password',
        'password_at',
        'online_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_confirmed_at' => 'datetime' ,
            'gender' => GenderEnum::class,
            'online_at' => 'datetime',
            'password' => 'hashed',
            'password_at' => 'datetime',
        ];
    }

    public function updatePassword(string $password) : bool
    {

        return $this->update([

            'password' => $password,

            'password_at' => now(),

        ]);
    }



    /**
     *
     *  Проверяет, подтвержден ли email у пользователя.
     *
     * @return bool
     */
    public function isEmailConfirmed() : bool
    {
        return ($this->email_confirmed_at == null) ? false : true;
    }

    /**
     *
     * подтрвеждение email у пользователя.
     *
     * @return bool
     */
    public function confirmEmail() : bool
    {
        return $this->update(['email_confirmed_at' => now()]);
    }
}
