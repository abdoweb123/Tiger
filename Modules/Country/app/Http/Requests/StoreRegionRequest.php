<?php

namespace Modules\Country\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'country_id' => ['required', 'exists:countries,id'],
            'status' => ['required', 'boolean'],
            'lat' => ['nullable', 'string'],
            'long' => ['nullable', 'string'],
            'delivery_cost' => ['nullable'],
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
