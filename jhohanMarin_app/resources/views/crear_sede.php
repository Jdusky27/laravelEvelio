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

        <?php
        $conn = new mysqli('localhost', 'root', '', 'adso555');

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $ciudades_result = $conn->query("SELECT codigo_ciudad, nombre_ciudad FROM ciudades");
        $empresas_result = $conn->query("SELECT nit, razon_social FROM empresas");

        if (isset($_POST['submit'])) {
            $nombre_sede = $_POST['nombre_sede'];
            $direccion_sede = $_POST['direccion_sede'];
            $codigo_ciudad = $_POST['codigo_ciudad'];
            $nit = $_POST['nit'];

            $sql = "INSERT INTO sedes (nombre_sede, direccion_sede, codigo_ciudad, nit) VALUES ('$nombre_sede', '$direccion_sede', '$codigo_ciudad', '$nit')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert'>Sede creada exitosamente.</div>";
            } else {
                echo "<div class='alert alert-error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }

        $conn->close();
        ?>

        <form action="crear_sede.php" method="POST">
            <div>
                <label for="nombre_sede">Nombre de la Sede:</label>
                <input type="text" name="nombre_sede" id="nombre_sede" required>
            </div>

            <div>
                <label for="direccion_sede">Dirección de la Sede:</label>
                <input type="text" name="direccion_sede" id="direccion_sede" required>
            </div>

            <div>
                <label for="codigo_ciudad">Ciudad:</label>
                <select name="codigo_ciudad" id="codigo_ciudad" required>
                    <option value="">Seleccione una ciudad</option>
                    <?php
                    if ($ciudades_result->num_rows > 0) {
                        while($row = $ciudades_result->fetch_assoc()) {
                            echo "<option value='" . $row['codigo_ciudad'] . "'>" . $row['nombre_ciudad'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay ciudades disponibles</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="nit">Empresa:</label>
                <select name="nit" id="nit" required>
                    <option value="">Seleccione una empresa</option>
                    <?php
                    if ($empresas_result->num_rows > 0) {
                        while($row = $empresas_result->fetch_assoc()) {
                            echo "<option value='" . $row['nit'] . "'>" . $row['razon_social'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay empresas disponibles</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" name="submit">Crear Sede</button>
        </form>
    </div>
</body>
</html>
