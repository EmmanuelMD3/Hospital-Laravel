<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'Servicio';

    protected $fillable = ['nombre_servicio'];

    public $timestamps = false;
}