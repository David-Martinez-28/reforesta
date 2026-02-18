<?php

namespace Database\Seeders;

use App\Models\Eventos;
use App\Models\Usuarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eventos::factory(10)->create();

        $usuario = Usuarios::first();
        Eventos::factory(5)->create([
            'id_anfitrion' => $usuario->id,
        ]);
    }
}
