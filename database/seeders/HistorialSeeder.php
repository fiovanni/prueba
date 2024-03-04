<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Historial;

class HistorialSeeder extends Seeder
{
    public function run(): void
    {
        Historial::factory(10)->create();
    }
}
