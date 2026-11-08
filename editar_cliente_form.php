<?php

$servername = "localhost";  
$username = "jefferson";      
$password = "123";   
$dbname = "baseweb2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$idcliente = $_GET['idcliente'];

$sql = "SELECT * FROM clientes WHERE idcliente = $idcliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No se encontró el cliente con ID $idcliente";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="estilologin1.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="logotipo.png" alt="Logotipo AQPSERVICE">
        </div>
        <nav>
            <ul>
                <li><a href="borrador_Inicio.html">AQPService</a></li>
                <li><a href="borrador_Inicio.html">Inicio</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="actualizar_cliente.php" method="post">
            <input type="hidden" name="idcliente" value="<?php echo $row['idcliente']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row['apellidos']; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?php echo $row['correo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" value="<?php echo $row['contrasena']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
            </div>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>