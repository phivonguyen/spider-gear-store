<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'token' => ['required'],
            'new_pw' => ['required', "regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/"],
            'new_pw_confirmation' => 'required | same:new_pw',
        ];
    }

    public function messages()
    {
        return [
            'new_pw.required' => "Please enter new password",
            'new_pw.regex' => "Password must be at least 8 characters and contain at least 1 letter, 1 number, 1 special character ",

            'new_pw_confirmation.required' => "Please enter password confirmation",
            'new_pw_confirmation.same' => "Password confirmation is not the same as password"
        ];
    }
}
