<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPost extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'login'    => 'required|email', 
            'password' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => 'El correo es obligatorio.',
            'login.email'    => 'Formato de correo no válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ];
    }
}