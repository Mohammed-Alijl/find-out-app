<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'email|required',
            'title' => 'required|string|max:150',
            'message' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => __('failed_messages.contact.name.required'),
          'name.max' => __('failed_messages.contact.name.max'),
          'email.required' => __('failed_messages.contact.email.required'),
          'email.email' => __('failed_messages.contact.email.email'),
          'title.required' => __('failed_messages.contact.title.required'),
          'title.max' => __('failed_messages.contact.title.max'),
          'message.required' => __('failed_messages.contact.message.required'),
        ];
    }
}
