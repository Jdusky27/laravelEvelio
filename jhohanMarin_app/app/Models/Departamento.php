<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    // Especifica la tabla asociada al modelo si no sigue la convención de nombres
    protected $table = 'departamentos';

    // Define qué atributos son asignables en masa
    protected $fillable = ['codigo_departamento', 'nombre_departamento'];

    // Indica si el modelo debe usar timestamps (created_at y updated_at)
    public $timestamps = false;

    // Si es necesario definir una clave primaria diferente
    protected $primaryKey = 'codigo_departamento';

    // Si la clave primaria no es un entero autoincremental
    protected $keyType = 'string';

    // Definir relación con Ciudades
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'codigo_departamento', 'codigo_departamento');
    }
}
