<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => ['required', 'regex:/^[a-zA-Z0-9_]{3,20}$/'],
            'password' => ['required', "regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/"],
            'password_confirmation' => 'required | same:password',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => "Please enter username",
            'username.regex' => "Username must be 3 to 20 characters",

            'password.required' => "Please enter password",
            'password.regex' => "Password must be at least 8 characters and contain at least 1 letter, 1 number, 1 special character ",

            'password_confirmation.required' => "Please enter password confirmation",
            'password_confirmation.same' => "Password confirmation is not the same as password",
        ];
    }
}
