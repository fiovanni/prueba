<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // seeders
        $this->call([
            // UserSeeder::class,
            ClubSeeder::class,
            PaisSeeder::class,
            PosicionSeeder::class,
            JugadorSeeder::class,
            HistorialSeeder::class
        ]);
    }
}
