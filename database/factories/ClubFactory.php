<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => 'olimpia',
            'codigo' => '1902',
            'fecha_fundacion' => '1902-01-01',
            'descripcion'  => 'club'
        ];
    }
}
