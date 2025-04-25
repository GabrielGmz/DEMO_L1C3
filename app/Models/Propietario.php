<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    protected $fillable = [
        'id_user',
        'titulo',
        'descripción',
        'precio_por_noche',
        'capacidad',
        'estado'
    ];
}
