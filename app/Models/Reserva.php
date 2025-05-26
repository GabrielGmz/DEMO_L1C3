<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';

    protected $fillable = [
        'id_use',
        'id_propiedad',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    // Relación con la propiedad reservada
    public function propiedad()
    {
        return $this->belongsTo(Propietario::class, 'id_propiedad');
    }

    // Relación con el usuario (cliente) que hizo la reserva
    public function user()
    {
        return $this->belongsTo(Login::class, 'id_use');
    }
}
