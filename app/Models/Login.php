<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    // Asegúrate de declarar el nombre de la tabla si no es 'logins'
    protected $table = 'login';

    // Campos que pueden llenarse masivamente
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
    ];

    // Relaciones
    public function propiedades()
    {
        return $this->hasMany(Propietario::class, 'id_user');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_user'); // estaba mal como 'id_use'
    }
}
