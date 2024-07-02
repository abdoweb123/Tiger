<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function withValidator($validator)
    {
        foreach ($validator->messages()->all() as $message) {
            toast($message, 'error');
        }

        $this->session()->flash('validation_errors', $validator->errors()->all());

        return redirect()->back()->withErrors($validator);
    }


}
