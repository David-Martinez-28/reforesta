<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosPost extends FormRequest
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
            // 'nombre' es UNIQUE en tu tabla
            'nombre' => 'required|string|max:255|unique:eventos,nombre',

            // Estos son NULLABLE (YES) en tu tabla
            'descripcion' => 'nullable|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'fecha' => 'nullable|date',
            'tipo_terreno' => 'nullable|string|max:255',
            'tipo_evento' => 'nullable|string|max:255',
            'imagen' => 'nullable|string|max:255',

            // id_anfitrion no se pide en el formulario, se asigna en el controlador
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del evento es obligatorio.',
            'nombre.unique' => 'Ya existe un evento con ese nombre.',
            'fecha.date' => 'La fecha debe tener un formato válido.',
        ];
    }
}
