<?php

namespace Modules\Coupon\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdataCouponRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string'],
            'type' => ['required', 'string'],

            'discount' => ['nullable', 'numeric'],
            'percent_off' => ['nullable', 'numeric'],

            'from' => ['required', 'date'],
            'to' => ['required', 'date'],

            'status' => ['required', 'boolean'],
            // 'products_ids' => ['required'],
            // 'products_ids.*' => ['required'],
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
