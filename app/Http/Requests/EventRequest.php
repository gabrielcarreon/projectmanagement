<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            "eventName" => ['required', 'max:255', 'string'],
            "description" => ['required', 'max:255', 'string'],
            "location" => ['required', 'max:255', 'string'],
            "startDate" => ['required', 'string', 'max:255'],
            "endDate" => ['required', 'string', 'max:255'],
//            "eventImage" => ['required', 'image', 'size:5048']
        ];
    }
}
