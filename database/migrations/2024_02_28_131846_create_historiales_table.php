<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        Schema::create('historiales', function (Blueprint $table) {
            $table->id();
            $table->integer('club_id'); // fk
            $table->integer('jugador_id'); // fk
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->unsignedinteger('goles'); 
            $table->unsignedinteger('asistencias');
            $table->unsignedinteger('partidos_jugados');
            $table->unsignedinteger('minutos_jugados');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historiales');
    }
};
