<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    // Especifica la tabla asociada al modelo si no sigue la convención de nombres
    protected $table = 'ciudades';

    // Define qué atributos son asignables en masa
    protected $fillable = ['codigo_ciudad', 'nombre_ciudad', 'codigo_departamento'];

    // Indica si el modelo debe usar timestamps (created_at y updated_at)
    public $timestamps = false;

    // Si es necesario definir una clave primaria diferente
    protected $primaryKey = 'codigo_ciudad';

    // Si la clave primaria no es un entero autoincremental
    protected $keyType = 'string';

    // Definir relación con Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'codigo_departamento', 'codigo_departamento');
    }
}
