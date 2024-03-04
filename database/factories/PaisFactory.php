<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaisFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->randomElement(['Paraguay', 'Argentina', 'Brasil', 'España']),
            'codigo' =>  'PAIS-000'.fake()->unique()->numberBetween(1, 4)
        ];
    }
}
