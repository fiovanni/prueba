<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $table='clubes';

    protected $fillable=[
        'id',
        'nombre',
        'codigo',
        'fecha_fundacion',
        'descripcion'
    ];

    public function jugador(){
        return $this->hasMany(Jugador::class, 'club_id', 'id');
    }

    public function historial(){
        return $this->hasMany(Historial::class, 'club_id', 'id');
    }
}
