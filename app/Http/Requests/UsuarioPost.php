<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 

class UsuarioPost extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Obtenemos el ID del usuario de la ruta para poder ignorarlo en el unique
        // Dependiendo de cómo se llame tu parámetro en web.php (usuario o usuarios)
        $usuarioId = $this->route('usuario') ?? $this->route('usuarios');

        return [
            'nombre' => 'required|string|max:255',

            // Si hay un ID, ignoramos ese registro en la validación unique
            'nick' => [
                'required',
                'string',
                'max:50',
                Rule::unique('usuarios', 'nick')->ignore($usuarioId),
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('usuarios', 'email')->ignore($usuarioId),
            ],

            // La contraseña solo es obligatoria al CREAR. Al EDITAR es nullable.
            'password' => $this->isMethod('POST')
                ? 'required|string|min:6|confirmed'
                : 'nullable|string|min:6|confirmed',

            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nick.unique' => 'Este nickname ya está siendo utilizado.',
            'email.unique' => 'Este correo ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'avatar.image' => 'El archivo debe ser una imagen (jpg, png, etc.).',
            'avatar.max' => 'La imagen es demasiado pesada (máximo 2MB).',
        ];
    }
}