<?php

namespace App\Http\Requests\Service;

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
        $cityCount = count($this->city_id);

        return [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'start_at' => 'nullable|date_format:H:i|required_with:end_at',
            'end_at' => 'nullable|date_format:H:i|after:start_at|required_with:start_at',
            'facebook_link' => ['nullable','regex:/^(https?:\/\/)?(www\.)?([a-zA-Z0-9\-]+\.){1,}[a-zA-Z]{2,6}(\S*)$/',],
            'instagram_link' => ['nullable','regex:/^(https?:\/\/)?(www\.)?([a-zA-Z0-9\-]+\.){1,}[a-zA-Z]{2,6}(\S*)$/',],
            'twitter_link' => ['nullable','regex:/^(https?:\/\/)?(www\.)?([a-zA-Z0-9\-]+\.){1,}[a-zA-Z]{2,6}(\S*)$/',],
            'category_id' => 'required|integer|exists:categories,id',
            'sub_category_id' => 'nullable|integer|exists:categories,id',
            'fixing_place' => 'boolean',
            'details' => 'nullable|string',
            'images'=>'required|array',
            'images.*'=>'image|mimes:jpeg,png,jpg,svg|max:2048',
            'zone_id'=>'array|required',
            'zone_id.*'=>'integer|exists:zones,id',
            'city_id'=>'array|required|size:' . $cityCount,
            'city_id.*'=>'integer|exists:cities,id',
            'mobile_number'=>'array|required|size:' . $cityCount,
            'mobile_number.*'=>'string|regex:/\d{8,15}/',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => __('failed_message.service.name.required'),
            'name_en.required' => __('failed_message.service.name.required'),
            'name_ar.max' => __('failed_message.service.name.max'),
            'name_en.max' => __('failed_message.service.name.max'),
            'start_at.date_format' => __('failed_message.service.start_at.date_format'),
            'end_at.date_format' => __('failed_message.service.end_at.date_format'),
            'facebook_link.regex' => __('failed_message.service.facebook_link.regex'),
            'instagram.regex' => __('failed_message.service.instagram.regex'),
            'category_id.required' => __('failed_message.service.category_id.required'),
            'category_id.integer' => __('failed_message.service.category_id.required'),
            'category_id.exists' => __('failed_message.service.category_id.required'),
            'images.required' => __('failed_message.service.images.required'),
            'images.*.image' => __('failed_message.service.images.*.image'),
            'images.*.mimes' => __('failed_message.service.images.*.mimes'),
            'images.*.max' => __('failed_message.service.images.*.max'),
            'zone_id.required' => __('failed_message.service.zone_id.required'),
            'zone_id.*.integer' => __('failed_message.service.zone_id.required'),
            'zone_id.*.exists' => __('failed_message.service.zone_id.required'),
            'city_id.required' => __('failed_message.service.city_id.required'),
            'city_id.size' => __('failed_message.service.city_id.size'),
            'city_id.*.integer' => __('failed_message.service.city_id.required'),
            'city_id.*.exists' => __('failed_message.service.city_id.required'),
            'mobile_number.required' => __('failed_message.service.mobile_number.required'),
            'mobile_number.size' => __('failed_message.service.mobile_number.size'),
            'mobile_number.*.regex' => __('failed_message.service.mobile_number.*.regex'),
        ];
    }
}
