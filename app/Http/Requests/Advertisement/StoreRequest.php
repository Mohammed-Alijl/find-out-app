<?php

namespace App\Http\Requests\Advertisement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'category_type_id' => 'required|integer|exists:category_types,id',
            'service_id' => 'required|integer|exists:services,id',
            'display_place' => ['required',Rule::in(['main', 'city', 'both'])],
            'city_id' => 'integer|exists:cities,id|required_if:display_place,city,both',
            'images'=>'required|array',
            'images.*'=>'image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
          'name_ar.required' => __('failed_messages.advertisement.name_ar.required'),
          'name_ar.max' => __('failed_messages.advertisement.name_en.max'),
          'name_en.required' => __('failed_messages.advertisement.name_en.required'),
          'name_en.max' => __('failed_messages.advertisement.name_ar.max'),
          'category_type_id.required' => __('failed_messages.advertisement.category_type_id.required'),
          'category_type_id.integer' => __('failed_messages.advertisement.category_type_id.integer'),
          'category_type_id.exists' => __('failed_messages.advertisement.category_type_id.exists'),
          'service_id.required' => __('failed_messages.advertisement.service_id.required'),
          'service_id.integer' => __('failed_messages.advertisement.service_id.integer'),
          'service_id.exists' => __('failed_messages.advertisement.service_id.exists'),
          'display_place.required' => __('failed_messages.advertisement.display_place.required'),
          'display_place.in' => __('failed_messages.advertisement.display_place.in'),
          'city_id.integer' => __('failed_messages.advertisement.city_id.integer'),
          'city_id.exists' => __('failed_messages.advertisement.city_id.exists'),
          'city_id.required_if' => __('failed_messages.advertisement.city_id.required_if'),
        ];
    }
}
