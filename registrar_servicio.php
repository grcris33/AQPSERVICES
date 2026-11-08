<?php
$servername = "localhost";  
$username = "jefferson";      
$password = "123";   
$dbname = "baseweb2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idvehiculo = $_POST['idvehiculo'];
    $idcliente = $_POST['idcliente'];
    $idmeca = $_POST['idmeca'];
    $detalles = $_POST['detalles'];
    $costo = $_POST['costo'];
    $fecha_entrega = $_POST['fecha_entrega'];

    $sql = "INSERT INTO servicios (idvehiculo, idcliente, idmeca, detalles, costo, fecha_entrega)
            VALUES ('$idvehiculo', '$idcliente', '$idmeca', '$detalles', '$costo', '$fecha_entrega')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de servicio exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener los datos para los menús desplegables
$clientes_result = $conn->query("SELECT idcliente, CONCAT(nombre, ' ', apellidos) AS nombre_completo FROM clientes");
$vehiculos_result = $conn->query("SELECT idvehiculo, marca, placa, idcliente FROM vehiculos");
$mecanicos_result = $conn->query("SELECT idmeca, nombre FROM mecanicos");

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Servicio</title>
    <link rel="stylesheet" href="estiloservicios.css">
</head>
<body>
    <div class="container">
        <h2>Registrar Servicio</h2>
        <form action="registrar_servicio.php" method="POST">
            <div class="form-group">
                <label for="idcliente">Cliente:</label>
                <select id="idcliente" name="idcliente" required>
                    <option value="">Seleccione un cliente</option>
                    <?php
                    if ($clientes_result->num_rows > 0) {
                        while ($row = $clientes_result->fetch_assoc()) {
                            echo "<option value='" . $row['idcliente'] . "'>" . $row['nombre_completo'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="idvehiculo">Vehículo:</label>
                <select id="idvehiculo" name="idvehiculo" required>
                    <option value="">Seleccione un vehículo</option>
                    <?php
                    if ($vehiculos_result->num_rows > 0) {
                        while ($row = $vehiculos_result->fetch_assoc()) {
                            echo "<option value='" . $row['idvehiculo'] . "' data-cliente='" . $row['idcliente'] . "'>" . $row['marca'] . " " . $row['placa'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="idmeca">Mecánico:</label>
                <select id="idmeca" name="idmeca" required>
                    <option value="">Seleccione un mecánico</option>
                    <?php
                    if ($mecanicos_result->num_rows > 0) {
                        while ($row = $mecanicos_result->fetch_assoc()) {
                            echo "<option value='" . $row['idmeca'] . "'>" . $row['nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="detalles">Detalles del Servicio:</label>
                <textarea id="detalles" name="detalles" required></textarea>
            </div>
            <div class="form-group">
                <label for="costo">Costo:</label>
                <input type="text" id="costo" name="costo" required>
            </div>
            <div class="form-group">
                <label for="fecha_entrega">Fecha de Entrega:</label>
                <input type="date" id="fecha_entrega" name="fecha_entrega" required>
            </div>
            <div class="form-row buttons">
                <button type="submit">Registrar Servicio</button>
                <button type="reset">Cancelar</button>
                <button type="button" onclick="window.location.href='borrador_Inicio.html'">Volver al Inicio</button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('idcliente').addEventListener('change', function() {
            var idcliente = this.value;
            var vehiculoSelect = document.getElementById('idvehiculo');
            for (var i = 0; i < vehiculoSelect.options.length; i++) {
                var option = vehiculoSelect.options[i];
                option.style.display = option.getAttribute('data-cliente') === idcliente ? 'block' : 'none';
            }
            vehiculoSelect.value = '';
        });
    </script>
</body>
</html>
