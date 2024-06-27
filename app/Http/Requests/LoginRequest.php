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
                'name'=>['required','min:5'],
                'password'=> ['required','min:4']
            ];
    }

    public function messages(){
        return[
            "name.required" => "Veuillez entrer votre nom complet",
            "name.min" => "Veuillez entrer votre nom complet de minimun 5 caracteres",
            "password.required" => "Veuillez entrer votre mot de passe",
            "password.min" => "Le mot de passe est minimun 4 caracteres",
        ];
    }
}
