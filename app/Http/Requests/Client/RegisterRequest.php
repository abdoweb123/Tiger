<?php

namespace App\Http\Requests\Client;

class RegisterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:clients,email'],
            'register_phone_code' => ['required'],
            'register_phone' => ['required', 'string', 'unique:clients,phone'],
            'password' => ['required', 'string'],
        ];
    }

}
