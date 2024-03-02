<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Posicion;

class PosicionSeeder extends Seeder
{
    public function run(): void
    {
        Posicion::factory()->create();
    }
}
