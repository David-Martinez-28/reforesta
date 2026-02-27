<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EventosPost extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        // Obtenemos el ID del evento desde la ruta
        $eventoId = $this->route('evento');

        return [
            // Añadimos el "ignore" al final de la regla unique
            'nombre' => 'required|string|max:255|unique:eventos,nombre,' . $eventoId,
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
