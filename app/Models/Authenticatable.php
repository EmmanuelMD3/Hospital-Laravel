<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Paciente extends Authenticatable
{
    protected $guard = 'paciente';
    // Resto de la configuración del modelo
}

class Empleado extends Authenticatable
{
    protected $guard = 'empleado';
    // Resto de la configuración del modelo
}
