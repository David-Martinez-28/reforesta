<?php

namespace Database\Seeders;

use App\Models\Especies;
use Illuminate\Database\Seeder;

class EspeciesSeeder extends Seeder
{
    public function run(): void
    {
       Especies::factory(20)->create();
    }
}