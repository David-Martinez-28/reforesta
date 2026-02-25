<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
            'nombre' => 'required|string|max:255|unique:eventos,nombre',

            'descripcion' => 'nullable|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'fecha' => 'nullable|date|after:today',
            'tipo_terreno' => [
                'required',
                Rule::in(['Bosque', 'Urbano', 'Montaña', 'Costa', 'Selva']),
            ],
            'tipo_evento' => [
                'required',
                Rule::in(['Plantación', 'Limpieza', 'Mantenimiento', 'Taller Educativo']),
            ],
            'imagen' => 'nullable|string|max:255',

        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del evento es obligatorio.',
            'nombre.unique' => 'Ya existe un evento con ese nombre.',
            'fecha.date' => 'La fecha debe tener un formato válido.',
            'ubicacion.required' => 'La ubicacion es requerida',
            'fecha.after' => 'La fecha del evento debe ser posterior a hoy.', // Mensaje personalizado
            'tipo_terreno.required' => 'El tipo de terreno seleccionado no es válido.',
            'tipo_evento.required' => 'El tipo de evento seleccionado no es válido.',
        ];
    }
}
