<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HistorialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'club_id' => fake()->numberBetween(1, 5),
            'jugador_id' => fake()->numberBetween(1, 5),       
            'fecha_desde' => fake()->dateTimeBetween('-10 years', '-5 years'),
            'fecha_hasta' => fake()->dateTimeBetween('-5 years'),
            'goles' => fake()->randomNumber(2),
            'asistencias' =>  fake()->randomNumber(2),
            'partidos_jugados' => fake()->randomNumber(2),
            'minutos_jugados' => fake()->randomNumber(3),
        ];
    }
}
