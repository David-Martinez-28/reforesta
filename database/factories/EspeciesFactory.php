<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Especies>
 */
class EspeciesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Especies::class;
    public function definition(): array
    {
        return [
            'nombre_cientifico'  => fake()->unique()->words(2, true), 
            'tiempo_para_adultez'=> fake()->randomElement(['2-3 años', '5-10 años', 'Meses']),
            'region_origen'      => fake()->country(),
            'clima'              => fake()->randomElement(['Tropical', 'Mediterráneo', 'Árido', 'Templado']),
            'enlace_descripcion' => fake()->url(),
            'foto_especie'       => fake()->image(),
            'beneficios'         => fake()->sentence(),
        ];
    }
}
