<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla manualmente
    protected $table = 'Empleados';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'matricula', 'nombre', 'apellidoP', 'apellidoM', 'IDServicio', 
        'sueldo', 'correo', 'usuario', 'contrasenia_hash', 'roles', 'foto'
    ];

    public $timestamps = false;
}