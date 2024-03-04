<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->randomElement(['Olimpia', 'Cerro Porteño', 'Luqueño', 'Guarani', 'Sol de América']),
            'codigo' =>  'CLUB-000'.fake()->unique()->randomDigitNotNull(),
            'fecha_fundacion' => fake()->date()
        ];
    }
}
