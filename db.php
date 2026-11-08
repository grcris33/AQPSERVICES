<?php

$servername = "localhost";  
$username = "jefferson";      
$password = "123";   
$dbname = "baseweb2"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];


$sql = "INSERT INTO clientes (nombre, apellidos, correo, contrasena, telefono, fecha_nacimiento)
VALUES ('$nombre', '$apellidos', '$correo', '$contrasena', '$telefono', '$fecha_nacimiento')";

if ($conn->query($sql) === TRUE) {
  echo "Registro exitoso";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
