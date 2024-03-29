<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table='jugadores';

    protected $fillable=[
        'id',
        'club_id',
        'posicion_id',
        'nacionalidad_id',
        'nombre',
        'apellido',
        'cuj',
        'edad',
        'nro_camiseta',
        'descripcion',
        'estado'      
    ];

    public function club(){
        return $this->belongsTo(Club::class, 'club_id', 'id');
    }

    public function posicion(){
        return $this->belongsTo(Posicion::class, 'posicion_id', 'id');
    }
    
    public function nacionalidad(){
        return $this->belongsTo(Pais::class, 'nacionalidad_id', 'id');
    }

    public function historial(){
        return $this->hasMany(Historial::class, 'jugador_id', 'id');
    }
}
