<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_type_id'=>'required|integer|exists:category_types,id'
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required'=>__('failed_messages.category.name_ar.required'),
            'name_ar.max'=>__('failed_messages.category.name_ar.max'),
            'name_en.required'=>__('failed_messages.category.name_en.required'),
            'name_en.max'=>__('failed_messages.category.name_en.max'),
            'category_type_id.required'=>__('failed_messages.category.category_type_id.required'),
            'category_type_id.integer'=>__('failed_messages.category.category_type_id.required'),
            'category_type_id.exists'=>__('failed_messages.category.category_type_id.required'),
        ];
    }
}
