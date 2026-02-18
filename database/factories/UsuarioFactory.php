<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuarios>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Usuario::class;
    public function definition(): array
    {
        return [
            'nick' => fake()->userName()->unique(),
            'nombre' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'ubicacion' => fake()->city() . ', ' . fake()->country(),
            'karma' => fake()->numberBetween(0,80000),
            'avatar' => fake()->imageUrl(),
            'tipo' => fake()->randomElement(['user','anfitrion']),
            'password' => bcrypt('passsword'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
