<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder
{
    public function run(): void
    {
        Club::create([
            'nombre' => 'olimpia',
            'codigo' => '1902',
            'fecha_fundacion' => '1902-01-01',
            'descripcion'  => 'club'
        ]);
    }
}
