<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class JugadorFactory extends Factory
{
    public function definition(): array
    {
        // nombres y apellidos en español
        $faker = FakerFactory::create();
        $faker->addProvider(new \Faker\Provider\es_ES\Person($faker));

        return [
            'club_id' => fake()->numberBetween(1, 5),
            'posicion_id' => fake()->numberBetween(1, 4),
            'nacionalidad_id' => fake()->numberBetween(1, 4),
            'nombre' => $faker->firstName(),
            'apellido' =>  $faker->lastName(),
            'cuj' => fake()->unique()->numerify('CUJ-####'),
            'edad' => fake()->numberBetween(16, 35),
            'nro_camiseta' => fake()->numberBetween(1, 11)
        ];
    }
}
