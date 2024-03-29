<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jugador;

class JugadorSeeder extends Seeder
{
    public function run(): void
    {
        Jugador::factory(10)->create([
            'descripcion' => 'jugador',
            'estado' => 'activo'
        ]);
    }
}
