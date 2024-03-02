<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JugadorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'club_id' => 1,
            'posicion_id' => 1,
            'nacionalidad_id' => 1,
            'nombre' => 'franco',
            'apellido' => 'salcedo',
            'cuj' => '1',
            'edad' => 20,
            'nro_camiseta' => 6,
            'descripcion' => 'jugador'
        ];
    }
}
