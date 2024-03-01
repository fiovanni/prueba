<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->foreign('club_id')->references('id')->on('clubes');
            $table->foreign('posicion_id')->references('id')->on('posiciones');
            $table->foreign('nacionalidad_id')->references('id')->on('paises');
        });
    }

    public function down(): void
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->dropForeign(['club_id']);
            $table->dropForeign(['posicion_id']);
            $table->dropForeign(['nacionalidad_id']);
        });
    }
};
