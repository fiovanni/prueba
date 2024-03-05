<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Faker\MyFaker;

class ClubFactory extends Factory
{
    public function definition(): array
    {
        $myFaker = new MyFaker();
        $clubes = $myFaker->clubes;

        return [
            'nombre' => fake()->unique()->randomElement($clubes),
            'codigo' =>  'CLUB-000'.fake()->unique()->randomDigitNotNull(),
            'fecha_fundacion' => fake()->date()
        ];
    }
}
