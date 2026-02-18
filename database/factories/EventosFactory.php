<?php

namespace Database\Factories;

use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eventos>
 */
class EventosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Eventos::class;
    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->sentence(3),
            'descripcion' => fake()->paragraph(),
            'ubicacion' => fake()->address(),
            'fecha' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'tipo_terreno' => fake()->randomElement(['Bosque', 'Montaña', 'Costa', 'Urbano']),
            'tipo_evento' => fake()->randomElement(['Reforestación', 'Limpieza']),
            'imagen' =>  fake()->image(),
            'id_anfitrion' => Usuarios::factory(),
        ];
    }
}
