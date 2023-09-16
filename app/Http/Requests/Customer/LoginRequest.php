<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|string|exists:users,email',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
          'email.required' => __('failed_messages.customer.email.required'),
          'email.email' => __('failed_messages.customer.email.email'),
          'email.exists' => __('failed_messages.auth.customer.not.found'),
          'password.required' => __('failed_messages.customer.password.required'),
        ];
    }
}
