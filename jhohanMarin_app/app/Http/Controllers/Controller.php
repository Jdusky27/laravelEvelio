<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Empresa;
use App\Models\Sede;

class SedeController extends Controller
{
    public function create()
    {
        // Obtener todos los departamentos, ciudades y empresas
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        $empresas = Empresa::all();

        // Pasar los datos a la vista
        return view('crear_sede', compact('departamentos', 'ciudades', 'empresas'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'nombre_sede' => 'required|string|max:255',
            'direccion_sede' => 'required|string|max:255',
            'codigo_ciudad' => 'required|exists:ciudades,codigo_ciudad',
            'nit' => 'required|exists:empresas,nit',
        ]);

        // Crear una nueva sede
        Sede::create([
            'nombre_sede' => $request->input('nombre_sede'),
            'direccion_sede' => $request->input('direccion_sede'),
            'codigo_ciudad' => $request->input('codigo_ciudad'),
            'nit' => $request->input('nit'),
        ]);

        // Redirigir al formulario con un mensaje de éxito
        return redirect()->route('sede.create')->with('success', 'Sede creada exitosamente.');
    }
}
