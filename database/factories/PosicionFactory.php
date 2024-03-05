<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Faker\MyFaker;

class PosicionFactory extends Factory
{
    public function definition(): array
    {
        $myFaker = new MyFaker();
        $posiciones = $myFaker->posiciones;

        return [
            'nombre' => fake()->unique()->randomElement($posiciones),
            'codigo' =>  'POSI-000'.fake()->unique()->numberBetween(1, 4)
        ];
    }    
}
