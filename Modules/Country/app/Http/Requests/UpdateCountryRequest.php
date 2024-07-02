<?php

namespace Modules\Country\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'country_code' => ['nullable', 'string'],
            'phone_code' => ['nullable', 'string'],
            'currancy_code' => ['nullable', 'string'],
            'currancy_value' => ['nullable', 'string'],
            'phone_length' => ['nullable', 'string'],
            'accept_orders' => ['nullable', 'string'],
            'status' => ['required', 'boolean'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
