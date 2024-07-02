<?php

namespace App\Http\Requests\Client;

class ProfileRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'email' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'phone_code' => ['nullable', 'string'],
            'country_code' => ['nullable', 'string'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }
}
