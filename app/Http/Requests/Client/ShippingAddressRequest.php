<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ShippingAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'country_id' => 'required|string',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $countryId = $this->input('country_id');

            if ($countryId == 1)
            {
                $validator->addRules([
                    'region' => 'required|numeric|exists:regions,id',
                    'block' => 'required|string',
                    'road' => 'required|string',
                    'building_no' => 'required|string',
                    'floor_no' => 'required|string',
                    'apartment' => 'required|string',
                    'apartmentType' => 'required|string',
                ]);
            } else {
                $validator->addRules([
                    'city' => 'required|string',
                    'address1' => 'required|string',
                ]);
            }
        });
    }


}
