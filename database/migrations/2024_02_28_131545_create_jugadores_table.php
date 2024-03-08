<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();           
            $table->integer('club_id'); // fk
            $table->integer('posicion_id'); // fk
            $table->integer('nacionalidad_id'); // fk
            $table->string('nombre', 40);
            $table->string('apellido', 40);
            $table->string('cuj', 10)->unique();
            $table->unsignedInteger('edad');
            $table->unsignedInteger('nro_camiseta');
            $table->string('descripcion', 40)->nullable();        
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
