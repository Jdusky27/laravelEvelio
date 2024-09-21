<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Sede</title>
    <link rel="stylesheet" href="./../css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nueva Sede</h1>

        <!-- Mostrar mensaje de éxito -->
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear una nueva sede -->
        <form action="{{ url('/crear-sede') }}" method="POST">
            @csrf

            <div>
                <label for="nombre_sede">Nombre de la Sede:</label>
                <input type="text" name="nombre_sede" id="nombre_sede" value="{{ old('nombre_sede') }}" required>
            </div>

            <div>
                <label for="direccion_sede">Dirección de la Sede:</label>
                <input type="text" name="direccion_sede" id="direccion_sede" value="{{ old('direccion_sede') }}" required>
            </div>

            <div>
                <label for="codigo_ciudad">Ciudad:</label>
                <select name="codigo_ciudad" id="codigo_ciudad" required>
                    <option value="">Seleccione una ciudad</option>
                    @foreach ($ciudades as $ciudad)
                        <option value="{{ $ciudad->codigo_ciudad }}" {{ old('codigo_ciudad') == $ciudad->codigo_ciudad ? 'selected' : '' }}>
                            {{ $ciudad->nombre_ciudad }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="nit">Empresa:</label>
                <select name="nit" id="nit" required>
                    <option value="">Seleccione una empresa</option>
                    @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->nit }}" {{ old('nit') == $empresa->nit ? 'selected' : '' }}>
                            {{ $empresa->razon_social }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Crear Sede</button>
        </form>
    </div>
</body>
</html>
