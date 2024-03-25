<?php

namespace App\Http\Requests\Registratrion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'login' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email:filter' , 'max:255', 'unique:users'],

            'password' => ['required', 'string', Password::defaults(), 'confirmed'],

            'agreement' => ['accepted'],

        ];
    }
}
