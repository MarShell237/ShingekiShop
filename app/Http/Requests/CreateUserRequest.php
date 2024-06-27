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
            'password'=>['required','min:4']
        ];
    }

    public function messages(){
        return[
            "name.required" => "Veuillez entrer votre nom complet",
            "name.min" => "Le nom complet es de minimun 5 caracteres",
            "phone.required" => "Veuillez entrer votre numeros de telephone",
            "phone.regex" => "le numeros ne peut contenir que des chiffres et le symbole +",
            "email.required" => "Veuillez entrer votre Email",
            "email.email" => "L'email doit contenir un @",
            "password.required" => "Veuillez entrer votre mot de passe",
            "password.min" => "Le mot de passe est minimun 4 caracteres",
        ];
    }
}
