<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_ar'=>'required|string|max:50',
            'name_en'=>'required|string|max:50',
            'zone_id'=>'required|integer|exists:zones,id',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required'=>__('failed_messages.city.name_ar.required'),
            'name_ar.max'=>__('failed_messages.city.name_ar.max'),
            'name_en.required'=>__('failed_messages.city.name_en.required'),
            'name_en.max'=>__('failed_messages.city.name_en.max'),
            'zone_id.required'=>__('failed_messages.city.zone_id.required'),
            'zone_id.integer'=>__('failed_messages.city.zone_id.required'),
            'zone_id.exists'=>__('failed_messages.city.zone_id.required')
        ];
    }
}
