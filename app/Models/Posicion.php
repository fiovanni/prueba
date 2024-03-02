<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posicion extends Model
{
    use HasFactory;
    
    protected $table='posiciones';

    protected $fillable=[
        'id',
        'nombre',
        'codigo'
    ];

    public function jugador(){
        return $this->hasMany(Jugador::class, 'posicion_id', 'id');
    }
}