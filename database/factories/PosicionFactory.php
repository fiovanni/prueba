<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PosicionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->randomElement(['arquero', 'defensor', 'mediocampista', 'delantero']),
            'codigo' =>  'POSI-000'.fake()->unique()->numberBetween(1, 4)
        ];
    }    
}
