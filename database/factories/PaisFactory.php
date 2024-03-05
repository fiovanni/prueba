<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Faker\MyFaker;

class PaisFactory extends Factory
{
    public function definition(): array
    {
        $myFaker = new MyFaker();
        $paises = $myFaker->paises;

        return [
            'nombre' => fake()->unique()->randomElement($paises),
            'codigo' =>  'PAIS-000'.fake()->unique()->randomDigitNotNull()
        ];
    }
}
