<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class ClubFactory extends Factory
{
    public function definition(): array
    {
        $faker = FakerFactory::create();

        return [
            'nombre' => $faker->unique()->randomElement(['Olimpia', 'Cerro Porteño', 'Luqueño', 'Guarani', 'Sol de América']),
            'codigo' =>  'CLUB-000'.$faker->unique()->numberBetween(1, 5),
            'fecha_fundacion' => fake()->date()
        ];
    }
}
