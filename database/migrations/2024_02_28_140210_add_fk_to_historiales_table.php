<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('historiales', function (Blueprint $table) {
            $table->foreign('club_id')->references('id')->on('clubes');
            $table->foreign('jugador_id')->references('id')->on('jugadores');
        });
    }

    public function down(): void
    {
        Schema::table('historiales', function (Blueprint $table) {
            $table->dropForeign(['club_id']);
            $table->dropForeign(['jugador_id']);
        });
    }
};
