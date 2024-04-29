<?php

namespace App\Models;

use App\Enums\Email\EmailStatusEnum;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property EmailStatusEnum $status
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email query()
 * @property int $id
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $value
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereValue($value)
 * @mixin \Eloquent
 */
class Email extends Model
{
    use HasFactory;

    use HasUuid;

    protected $fillable = [

        'uuid',

        'value',

        'user_id',

        'status',

        'code',

    ];

    protected $casts = [

        'status' => EmailStatusEnum::class,

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function UpdateStatus(EmailStatusEnum $status) : bool
    {

        if($this->status->is($status)){

            return false;

        }

        return $this->update(['status' => $status]);
    }

    public static function booted(): void
    {
        self::creating( function(Email $email) {

            $email->code = code();

        });
    }

    //этот метод берём теперь из trait
    // public static function booted() : void
    // {
    //     static::creating(function (Email $email){

    //         $email->fill([
    //             'uuid' => uuid(),
    //         ]);
    //         // $password->uuid = uuid();

    //     });

    // }

}
