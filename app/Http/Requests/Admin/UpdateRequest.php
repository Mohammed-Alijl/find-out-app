<?php

namespace App\Http\Requests\Admin;

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
            'email' => 'required|email|unique:admins,email,' . $this->id,
            'username' => 'required|string|regex:/\w*$/|unique:admins,username,' .  $this->id,
            'mobile_number' => 'required|string|max:15|unique:admins,mobile_number' .  $this->id,
            'password' => 'nullable|string|min:8|max:255|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}
