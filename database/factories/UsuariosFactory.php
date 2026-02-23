<?php

namespace Database\Factories;

use App\Models\Usuarios; // Asegúrate de que sea plural si así nombraste al modelo
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuariosFactory extends Factory
{
    protected $model = Usuarios::class;

    public function definition(): array
    {
        return [
            'nick' => fake()->unique()->userName(), // unique() va antes
            'nombre' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'ubicacion' => fake()->city() . ', ' . fake()->country(),
            'karma' => fake()->numberBetween(0, 80000),
            'avatar' => fake()->imageUrl(200, 200, 'people'),
            'tipo' => fake()->randomElement(['user', 'anfitrion']),
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
?>