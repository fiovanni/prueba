<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PosicionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => 'mediocampista',
            'codigo' => '66'
        ];
    }
}
