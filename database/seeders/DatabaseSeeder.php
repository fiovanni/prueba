<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::beginTransaction();

        // desactiva fk
        DB::statement('
            DO $$
            DECLARE
                r RECORD;
            BEGIN
                FOR r IN (SELECT tablename FROM pg_tables WHERE schemaname = current_schema()) LOOP
                    EXECUTE \'ALTER TABLE \' || quote_ident(r.tablename) || \' DISABLE TRIGGER ALL\';
                END LOOP;
            END $$;
        ');

        // seeders
        $this->call([
            // UserSeeder::class,            
            JugadorSeeder::class,
            ClubSeeder::class,
            PaisSeeder::class,
            PosicionSeeder::class,
            HistorialSeeder::class    
        ]);

        // activa fk
        DB::statement('
            DO $$
            DECLARE
                r RECORD;
            BEGIN
                FOR r IN (SELECT tablename FROM pg_tables WHERE schemaname = current_schema()) LOOP
                    EXECUTE \'ALTER TABLE \' || quote_ident(r.tablename) || \' ENABLE TRIGGER ALL\';
                END LOOP;
            END $$;
        ');

        DB::commit();
    }
}
