<?php

$servername = "localhost";  
$username = "jefferson";      
$password = "123";   
$dbname = "baseweb2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$idcliente = $_POST['idcliente'];
$idvehiculo = $_POST['idvehiculo'];
$tecnico = $_POST['tecnico'];
$concesionario = $_POST['concesionario'];
$tipo_servicio = $_POST['tipo_servicio'];
$detalle = $_POST['detalle'];
$ciudad = $_POST['ciudad'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// Preparar la consulta SQL
$sql = "INSERT INTO citas (idcliente, idvehiculo, tecnico, concesionario, tipo_servicio, detalle, ciudad, fecha, hora)
VALUES ($idcliente, $idvehiculo, '$tecnico', '$concesionario', '$tipo_servicio', '$detalle', '$ciudad', '$fecha', '$hora')";

if ($conn->query($sql) === TRUE) {
    echo "Cita agendada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
