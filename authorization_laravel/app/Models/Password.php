<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Passwords\PasswordStatusEnum;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property int $id
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $email
 * @property int|null $user_id
 * @property PasswordStatusEnum $status
 * @property string $ip
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Password newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Password newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Password query()
 * @method static \Illuminate\Database\Eloquent\Builder|Password whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Password whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Password whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Password whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Password whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Password whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Password whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Password whereUuid($value)
 * @mixin \Eloquent
 */
class Password extends Model
{
    use HasFactory;

    use HasUuid;


    protected $fillable = [

        'uuid',

        'email',

        'user_id',

        'status',

        'ip',

    ];

    protected $casts = [

        'status' => PasswordStatusEnum::class,

    ];

    //этот метод берём теперь из trait
    // public static function booted() : void
    // {
    //     static::creating(function (Password $password){

    //         $password->fill([
    //             'uuid' => uuid(),
    //         ]);
    //         // $password->uuid = uuid();

    //     });

    // }



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function UpdateStatus(PasswordStatusEnum $status) : bool
    {

        if($this->status->is($status)){

            return false;

        }

        return $this->update(['status' => $status]);
    }
}
