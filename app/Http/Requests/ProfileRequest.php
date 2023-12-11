<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'month' => ['required', 'int'],
            'day' => ['required', 'int'],
            'year' => ['required', 'int'],
            'email' => ['required','email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'min:11', 'max:11'],
            'maritalStatus' => ['required', 'int', 'digits:1'],
//            'image' => ['image', 'size:5048']
        ];
    }

    public function messages(){
        return [
            'fname.required' => 'First name field is required',
            'lname.required' => 'Last name field is required',
            'year.required' => 'Birth year field is required',
            'month.required' => 'Birth month field is required',

        ];
    }
}
