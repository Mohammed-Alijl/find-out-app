<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => __('failed_messages.page.name_ar.required'),
            'name_ar.max' => __('failed_messages.page.name_ar.max'),
            'name_en.required' => __('failed_messages.page.name_en.required'),
            'name_en.max' => __('failed_messages.page.name_en.max'),
            'content.required' => __('failed_messages.page.content.required'),
            'image.image' => __('failed_messages.page.image.image'),
            'image.mimes' => __('failed_messages.page.image.mimes'),
        ];
    }
}
