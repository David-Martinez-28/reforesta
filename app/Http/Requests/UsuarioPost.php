<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioPost extends FormRequest
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
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'nick' => 'required|string|max:50|unique:usuarios,nick',
            'email' => 'required|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Permiso para subir fotos de máx 2MB
        ];
    }

    public function messages(): array
    {
        return [
            // Mensajes para el campo Nombre
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',

            // Mensajes para el campo Nick
            'nick.required' => 'El nickname es obligatorio.',
            'nick.unique' => 'Este nickname ya está siendo utilizado por otro usuario.',

            // Mensajes para el campo Email
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debes introducir un formato de correo válido.',
            'email.unique' => 'Este correo ya está registrado.',

            // Mensajes para el campo Password (los que pedías)
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',

            // Mensaje para el Avatar
            'avatar.image' => 'El archivo debe ser una imagen (jpg, png, etc.).',
            'avatar.max' => 'La imagen es demasiado pesada (máximo 2MB).',
        ];
    }
}