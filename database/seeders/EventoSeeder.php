<?php

namespace Database\Seeders;

use App\Models\Eventos;
use App\Models\Usuarios;
use App\Models\Especies;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    public function run(): void
    {
        Eventos::factory()
        ->count(3)
        ->for(Usuarios::factory()->create(),'anfitrion')
        ->hasAttached(
            Usuarios::factory()->count(2),
            [],
            'asistentes'
        )
        ->hasAttached(
            Especies::factory()->count(2),
            [],
            'especies'
        )
        ->create();
    }
}