<?php

namespace App\Http\Requests\Client;

use App\Rules\PhoneLength;

class LoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'phone' => [
                'required',
                'exists:clients,phone',
                'numeric',
                new PhoneLength($this->input('country_code'),$max=8)
            ],
            'country_code' => 'required|exists:countries,country_code',
            'password' => 'required',
        ];
    }

}
