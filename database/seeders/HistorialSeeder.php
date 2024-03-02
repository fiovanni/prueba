<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Historial;

class HistorialSeeder extends Seeder
{
    public function run(): void
    {
        Historial::create([
            'club_id' => 1,
            'jugador_id' => 1,          
            'fecha_desde' => '2023-01-01',
            'fecha_hasta' => '2024-01-01',
            'goles' => 1,
            'asistencias' => 1,
            'partidos_jugados' => 1,
            'minutos_jugados' => 6
        ]);
    }
}
