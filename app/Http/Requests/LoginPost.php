<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPost extends FormRequest
{
    public function authorize(): bool
    {
        return true; // IMPORTANTE: Cambiar a true
    }

    public function rules(): array
    {
        return [
            'login'    => 'required|email', // 'login' es el nombre del input en tu HTML
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