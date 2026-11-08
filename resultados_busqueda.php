<?php

$servername = "localhost";  
$username = "jefferson";      
$password = "123";   
$dbname = "baseweb2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$criterio = $_GET['criterio'];

$sql = "SELECT idcliente, nombre, apellidos, correo, telefono, fecha_nacimiento FROM clientes 
        WHERE nombre LIKE '%$criterio%' OR correo LIKE '%$criterio%'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Búsqueda</title>
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
        <h1>Resultados de Búsqueda</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["idcliente"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["apellidos"] . "</td>";
                        echo "<td>" . $row["correo"] . "</td>";
                        echo "<td>" . $row["telefono"] . "</td>";
                        echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron resultados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
$conn->close();
?>