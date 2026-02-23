<?php

namespace Database\Factories;

use App\Models\Especies;
use Illuminate\Database\Eloquent\Factories\Factory;

class EspeciesFactory extends Factory
{
    protected $model = Especies::class;

    public function definition(): array
    {
        return [
            'nombre_cientifico' => fake()->unique()->words(2, true), // Simula un nombre en latín
            'tiempo_para_adultez' => fake()->randomElement(['2 meses', '1 año', '5 años']),
            'region_origen' => fake()->country(),
            'clima' => fake()->randomElement(['Tropical', 'Templado', 'Seco', 'Frío']),
            'enlace_descripcion' => fake()->url(),
            'foto_especie' => fake()->imageUrl(400, 400, 'nature'),
            'beneficios' => fake()->sentence(),
        ];
    }
}
