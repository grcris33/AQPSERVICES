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
    $idcliente = $_POST['idcliente'];
    $idvehiculo = $_POST['idvehiculo'];
    $idservicio = $_POST['idservicio'];
    $estado_pago = $_POST['estado_pago'];
    $fecha_factura = $_POST['fecha_factura'];

    // Obtener el costo del servicio seleccionado
    $costo_result = $conn->query("SELECT costo FROM servicios WHERE idservicio = '$idservicio'");
    $costo = $costo_result->fetch_assoc()['costo'];

    $sql = "INSERT INTO factura (idcliente, idservicio, costo, estado_pago, fecha_factura)
            VALUES ('$idcliente', '$idservicio', '$costo', '$estado_pago', '$fecha_factura')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de factura exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener los datos para los menús desplegables
$clientes_result = $conn->query("SELECT idcliente, CONCAT(nombre, ' ', apellidos) AS nombre_completo FROM clientes");
$servicios_result = $conn->query("SELECT idservicio, detalles, costo FROM servicios");

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Factura</title>
    <link rel="stylesheet" href="stylecitas.css">
</head>
<body>
    <div class="container">
        <h2>Registrar Factura</h2>
        <form action="registrar_factura.php" method="POST">
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
                </select>
            </div>
            <div class="form-group">
                <label for="idservicio">Servicio:</label>
                <select id="idservicio" name="idservicio" required>
                    <option value="">Seleccione un servicio</option>
                    <?php
                    if ($servicios_result->num_rows > 0) {
                        while ($row = $servicios_result->fetch_assoc()) {
                            echo "<option value='" . $row['idservicio'] . "' data-costo='" . $row['costo'] . "'>" . $row['detalles'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="costo">Costo:</label>
                <input type="text" id="costo" name="costo" readonly>
            </div>
            <div class="form-group">
                <label for="estado_pago">Estado de Pago:</label>
                <select id="estado_pago" name="estado_pago" required>
                    <option value="">Seleccione el estado de pago</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="pagado">Pagado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_factura">Fecha de la Factura:</label>
                <input type="date" id="fecha_factura" name="fecha_factura" required>
            </div>
            <div class="form-row buttons">
                <button type="submit">Registrar Factura</button>
                <button type="reset">Cancelar</button>
                <button type="button" onclick="window.location.href='borrador_Inicio.html'">Volver al Inicio</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('idservicio').addEventListener('change', function() {
            var costo = this.options[this.selectedIndex].getAttribute('data-costo');
            document.getElementById('costo').value = costo;
        });

        document.getElementById('idcliente').addEventListener('change', function() {
            var idcliente = this.value;

            fetch('obtener_vehiculos.php?idcliente=' + idcliente)
                .then(response => response.json())
                .then(data => {
                    var vehiculoSelect = document.getElementById('idvehiculo');
                    vehiculoSelect.innerHTML = '<option value="">Seleccione un vehículo</option>';
                    data.forEach(function(vehiculo) {
                        var option = document.createElement('option');
                        option.value = vehiculo.idvehiculo;
                        option.textContent = vehiculo.marca + ' - ' + vehiculo.placa;
                        vehiculoSelect.appendChild(option);
                    });
                });
        });
    </script>
</body>
</html>
