<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'=>['required','min:5'],
            'phone'=>['required','regex:/^[0-9+]+$/'],
            'email'=>['required','email'],
            'default_city' => ['required','exists:ville,id'],
            'password'=>['required','min:4']
        ];
    }
}
