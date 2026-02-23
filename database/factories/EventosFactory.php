<?php

namespace Database\Factories;

use App\Models\Eventos;
use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventosFactory extends Factory
{
    protected $model = Eventos::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->sentence(3),
            'descripcion' => fake()->paragraph(),
            'ubicacion' => fake()->address(),
            'fecha' => fake()->dateTimeBetween('now', '+1 year'),
            'tipo_terreno' => fake()->randomElement(['Bosque', 'Urbano', 'Montaña']),
            'tipo_evento' => fake()->randomElement(['Reforestación', 'Charla']),
            'imagen' => fake()->imageUrl(640, 480, 'nature'),
            'id_anfitrion' => Usuarios::factory(),
            
        ];
    }
}
?>