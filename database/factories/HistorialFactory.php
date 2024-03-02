<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HistorialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'club_id' => 1,
            'jugador_id' => 1,          
            'fecha_desde' => '2023-01-01',
            'fecha_hasta' => '2024-01-01',
            'goles' => 1,
            'asistencias' => 1,
            'partidos_jugados' => 1,
            'minutos_jugados' => 6
        ];
    }
}
