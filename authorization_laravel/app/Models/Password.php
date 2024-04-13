<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Passwords\PasswordStatusEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Password extends Model
{
    use HasFactory;


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

    public static function booted() : void
    {
        static::creating(function (Password $password){

            $password->fill([
                'uuid' => uuid(),
            ]);
            // $password->uuid = uuid();

        });

    }


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
