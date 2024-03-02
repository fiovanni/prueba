<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table='historiales';

    protected $fillable=[
        'id',
        'club_id',
        'jugador_id',
        'fecha_desde',
        'fecha_hasta',
        'goles',
        'asistencias',
        'partidos_jugados',
        'minutos_jugados'
    ];

    public function club(){
        return $this->belongsTo(Club::class, 'club_id', 'id');
    }
    
    public function jugador(){
        return $this->belongsTo(Jugador::class, 'jugador_id', 'id');
    }
}
