<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ejemplo seed
        User::factory(10)->create();
        
        // sobreescribe los campos
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
    }
}
