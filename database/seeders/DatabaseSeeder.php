<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // DB::beginTransaction();

        // seeders
        $this->call([
            // UserSeeder::class,            
            ClubSeeder::class,
            PaisSeeder::class,
            PosicionSeeder::class,
            JugadorSeeder::class,
            HistorialSeeder::class
        ]);

        // DB::commit();
    }
}
