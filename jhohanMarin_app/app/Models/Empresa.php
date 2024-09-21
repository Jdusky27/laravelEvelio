<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    // Especifica la tabla asociada al modelo si no sigue la convención de nombres
    protected $table = 'empresas';

    // Define qué atributos son asignables en masa
    protected $fillable = ['nit', 'razon_social'];

    // Indica si el modelo debe usar timestamps (created_at y updated_at)
    public $timestamps = false;

    // Si es necesario definir una clave primaria diferente
    protected $primaryKey = 'nit';

    // Si la clave primaria no es un entero autoincremental
    protected $keyType = 'string';
}
