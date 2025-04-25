<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
    ];

    public function propiedades()
    {
        return $this->hasMany(Propietario::class, 'id_user');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_user');
    }
}
