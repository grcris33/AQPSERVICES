<?php

$servername = "localhost";
$username = "jefferson";
$password = "123";
$dbname = "baseweb2";

/
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT * FROM mecanicos";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error al ejecutar la consulta: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Ciudad</th><th>DNI</th><th>Teléfono</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['idmeca'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['edad'] . "</td>";
            echo "<td>" . $row['ciudad'] . "</td>";
            echo "<td>" . $row['dni'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron mecánicos registrados";
    }
}


$conn->close();

?>