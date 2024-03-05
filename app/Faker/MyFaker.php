<?php

namespace App\Faker;

use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;

class MyFaker extends FakerGenerator
{
    public $clubes = [
        'Olimpia', 
        'Cerro Porteño', 
        'Luqueño', 
        'Guarani', 
        'Sol de América'       
    ];

    public $paises = [
        'Paraguay', 
        'Argentina', 
        'Brasil', 
        'España'
    ];

    public $posiciones = [
        'arquero', 
        'defensor', 
        'mediocampista', 
        'delantero'
    ];
}