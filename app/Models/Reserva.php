<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Reserva extends Model
{
    protected $fillable = [
        'id_use',
        'id_propiedad',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    public function propiedad()
    {
        return $this->belongsTo(Propietario::class, 'id_propiedad');
    }
}
