<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'digits:11'],
            'password' => ['required', 'min:8', 'max:255'],
            'confirmPassword' => ['required', 'min:8', 'max:255'],
            'month' => ['required', 'int', 'min:1'],
            'day' => ['required', 'int', 'min:1'],
            'year' => ['required', 'int', 'min:1'],
            'maritalStatus' => ['required', 'int', 'digits:1', 'min:1', 'max:3'],
            'sex' => ['required', 'int', 'min:1', 'max:2']
        ];
    }

    public function messages(){
        return [
            'fname,required' => 'First name field is required.',
            'lname.required' => 'Last name field is required',
            'address.required' => 'Address field is required.',
            'contact.required' => 'Contact field is required.',
            'password.required' => 'Password field is required.',
        ];
    }
}
