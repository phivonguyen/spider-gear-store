<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'first_name' => ['nullable', "regex:/^[A-Za-z'-]+$/"],
            'middle_name' => ['nullable', "regex:/^[A-Za-z'-]+$/"],
            'last_name' => ['nullable', "regex:/^[A-Za-z'-]+$/"],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'regex:/^(03[2-9]|05[689]|07[06789]|08[1-9]|09[0-46-9])[0-9]{7}$/']
        ];
    }

    public function messages()
    {
        return [
            'first_name.*' => "Name fields shouldn't have special characters",
            'middle_name.*' => "Name fields shouldn't have special characters",
            'last_name.*' => "Name fields shouldn't have special characters",

            'email.email' => 'Your email is invalid',
            'phone.regex' => 'Your phone number is invalid',
        ];
    }
}
