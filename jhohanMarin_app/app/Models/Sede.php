<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    // Los campos que se pueden asignar masivamente
    protected $fillable = ['nombre_sede', 'direccion_sede', 'codigo_ciudad', 'nit'];

    // Desactiva los timestamps si no se usan
    public $timestamps = false;
}
