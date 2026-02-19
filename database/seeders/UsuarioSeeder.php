<?php

namespace Database\Seeders;

use App\Models\Usuarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Usuarios::factory()
        ->count(5)
        ->has(Eventos::factory()->count(3),'eventosOrganizados')
        ->hasAttached(Eventos::factory()->count(3),
        [],
        'asistentes')
        ->create();

        
    }
}
