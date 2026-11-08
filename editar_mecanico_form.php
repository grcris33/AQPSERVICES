<?php

$servername = "localhost";  
$username = "jefferson";      
$password = "123";   
$dbname = "baseweb2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$idmeca = $_GET['idmeca'];

$sql = "SELECT * FROM mecanicos WHERE idmeca = $idmeca";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No se encontró el mecánico con ID $idmeca";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Mecánico</title>
    <link rel="stylesheet" href="Registromecanico.css">
</head>
<body>
    <form action="actualizar_mecanico.php" method="post">
        <input type="hidden" name="idmeca" value="<?php echo $row['idmeca']; ?>">
        <label for="nombre">Nombre del mecánico:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?php echo $row['edad']; ?>" required>

        <div class="form-group">
            <label for="ciudad-select">Ciudad de nacimiento:</label>
            <select id="ciudad-select" name="ciudad" onchange="actualizarCiudad()">
                <option value="">Seleccione su ciudad</option>
                <option value="Amazonas" <?php echo $row['ciudad'] == 'Amazonas' ? 'selected' : ''; ?>>Amazonas</option>
                <option value="Ancash" <?php echo $row['ciudad'] == 'Ancash' ? 'selected' : ''; ?>>Ancash</option>
                <option value="Apurimac" <?php echo $row['ciudad'] == 'Apurimac' ? 'selected' : ''; ?>>Apurimac</option>
                <option value="Arequipa" <?php echo $row['ciudad'] == 'Arequipa' ? 'selected' : ''; ?>>Arequipa</option>
                <option value="Ayacucho" <?php echo $row['ciudad'] == 'Ayacucho' ? 'selected' : ''; ?>>Ayacucho</option>
                <option value="Cajamarca" <?php echo $row['ciudad'] == 'Cajamarca' ? 'selected' : ''; ?>>Cajamarca</option>
                <option value="Callao" <?php echo $row['ciudad'] == 'Callao' ? 'selected' : ''; ?>>Callao</option>
                <option value="Cusco" <?php echo $row['ciudad'] == 'Cusco' ? 'selected' : ''; ?>>Cusco</option>
                <option value="Huancavelica" <?php echo $row['ciudad'] == 'Huancavelica' ? 'selected' : ''; ?>>Huancavelica</option>
                <option value="Huanuco" <?php echo $row['ciudad'] == 'Huanuco' ? 'selected' : ''; ?>>Huanuco</option>
                <option value="Ica" <?php echo $row['ciudad'] == 'Ica' ? 'selected' : ''; ?>>Ica</option>
                <option value="Junin" <?php echo $row['ciudad'] == 'Junin' ? 'selected' : ''; ?>>Junin</option>
                <option value="LaLibertad" <?php echo $row['ciudad'] == 'LaLibertad' ? 'selected' : ''; ?>>La Libertad</option>
                <option value="Lambayeque" <?php echo $row['ciudad'] == 'Lambayeque' ? 'selected' : ''; ?>>Lambayeque</option>
                <option value="Lima" <?php echo $row['ciudad'] == 'Lima' ? 'selected' : ''; ?>>Lima</option>
                <option value="Loreto" <?php echo $row['ciudad'] == 'Loreto' ? 'selected' : ''; ?>>Loreto</option>
                <option value="Madrededios" <?php echo $row['ciudad'] == 'Madre de Dios' ? 'selected' : ''; ?>>Madre de Dios</option>
                <option value="Moquegua" <?php echo $row['ciudad'] == 'Moquegua' ? 'selected' : ''; ?>>Moquegua</option>
                <option value="Pasco" <?php echo $row['ciudad'] == 'Pasco' ? 'selected' : ''; ?>>Pasco</option>
                <option value="Piura" <?php echo $row['ciudad'] == 'Piura' ? 'selected' : ''; ?>>Piura</option>
                <option value="Puno" <?php echo $row['ciudad'] == 'Puno' ? 'selected' : ''; ?>>Puno</option>
                <option value="SanMartin" <?php echo $row['ciudad'] == 'San Martin' ? 'selected' : ''; ?>>San Martin</option>
                <option value="Tacna" <?php echo $row['ciudad'] == 'Tacna' ? 'selected' : ''; ?>>Tacna</option>
                <option value="Tumbes" <?php echo $row['ciudad'] == 'Tumbes' ? 'selected' : ''; ?>>Tumbes</option>
                <option value="Ucayali" <?php echo $row['ciudad'] == 'Ucayali' ? 'selected' : ''; ?>>Ucayali</option>
            </select>
        </div>

        <br><br>
        <div class="form-group">
            <label for="ciudad-nacimiento">Ciudad seleccionada:</label>
            <input type="text" id="ciudad-nacimiento" name="ciudad-nacimiento" value="<?php echo $row['ciudad']; ?>" readonly>
        </div>

        <script>
            function actualizarCiudad() {
                var select = document.getElementById("ciudad-select");
                var input = document.getElementById("ciudad-nacimiento");
                var ciudadSeleccionada = select.options[select.selectedIndex].text;
                
                if (ciudadSeleccionada !== "Seleccione su ciudad") {
                    input.value = ciudadSeleccionada;
                } else {
                    input.value = "";
                }
            }
        </script>

        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" value="<?php echo $row['dni']; ?>" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" required>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>