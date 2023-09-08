<?php

namespace App\Http\Requests\Customer;

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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email, ' . $this->id,
            'mobile_number' => 'required|string|max:15|unique:users,mobile_number, ' . $this->id,
            'password' => 'string|min:8|max:255|confirmed',
            'zone_id' => 'required|integer|exists:zones,id',
            'city_id' => 'required|integer|exists:cities,id',
            'platform' => 'required|string|in:android,ios',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('failed_messages.customer.name.required'),
            'name.max' => __('failed_messages.customer.name.max'),
            'email.required' => __('failed_messages.customer.email.required'),
            'email.email' => __('failed_messages.customer.email.email'),
            'email.unique' => __('failed_messages.customer.email.unique'),
            'mobile_number.required' => __('failed_messages.customer.mobile_number.required'),
            'mobile_number.max' => __('failed_messages.customer.mobile_number.max'),
            'mobile_number.unique' => __('failed_messages.customer.mobile_number.unique'),
            'password.min' => __('failed_messages.customer.password.min'),
            'password.max' => __('failed_messages.customer.password.max'),
            'password.confirmed' => __('failed_messages.customer.password.confirmed'),
            'zone_id.required' => __('failed_messages.customer.zone_id.required'),
            'zone_id.integer' => __('failed_messages.customer.zone_id.required'),
            'zone_id.exists' => __('failed_messages.customer.zone_id.required'),
            'city_id.required' => __('failed_messages.customer.city_id.required'),
            'city_id.integer' => __('failed_messages.customer.city_id.required'),
            'city_id.exists' => __('failed_messages.customer.city_id.required'),
            'platform.required' => __('failed_messages.customer.platform.required'),
            'platform.in' => __('failed_messages.customer.platform.in'),
        ];
    }
}
