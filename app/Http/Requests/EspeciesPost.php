<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspeciesPost extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'nombre_cientifico' => 'required|unique:especies,nombre_cientifico|max:255',
            'tiempo_para_adultez' => 'nullable|string|max:255',
            'region_origen' => 'nullable|string|max:255',
            'clima' => 'nullable|string|max:255',
            'enlace_descripcion' => 'nullable|url|max:255',
            'beneficios' => 'nullable|string',
            // Validamos que sea una imagen real y no muy pesada (2MB)
            'foto_especie' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    
    public function messages(): array
    {
        return [
            'nombre_cientifico.required' => 'El nombre científico es obligatorio.',
            'nombre_cientifico.unique' => 'Esta especie ya está registrada.',
            'foto_especie.image' => 'El archivo debe ser una imagen válida.',
            'foto_especie.max' => 'La imagen no debe pesar más de 2MB.',
        ];
    }
}