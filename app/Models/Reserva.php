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

    public function propiedad()
    {
        return $this->belongsTo(Propietario::class, 'id_propiedad');
    }


    public function user()
    {
        return $this->belongsTo(Login::class, 'id_use');
    }
}
