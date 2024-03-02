<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jugador;

class JugadorSeeder extends Seeder
{
    public function run(): void
    {
        Jugador::create([
            'club_id' => 1,
            'posicion_id' => 1,
            'nacionalidad_id' => 1,
            'nombre' => 'franco',
            'apellido' => 'salcedo',
            'cuj' => '1',
            'edad' => 20,
            'nro_camiseta' => 6,
            'descripcion' => 'jugador'
        ]);
    }
}
