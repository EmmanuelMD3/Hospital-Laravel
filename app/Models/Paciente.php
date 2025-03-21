<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla manualmente
    protected $table = 'Paciente';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre', 'apellidoP', 'apellidoM', 'NSS', 'telefono', 
        'correo', 'direccion', 'foto'
    ];

    public $timestamps = false;
}