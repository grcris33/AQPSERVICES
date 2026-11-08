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
$edad = $_POST['edad'];
$ciudad = $_POST['ciudad-nacimiento'];
$dni = $_POST['dni'];
$telefono = $_POST['id-mecanico'];


$sql = "INSERT INTO mecanicos (nombre, edad, ciudad, dni, telefono)
VALUES ('$nombre', $edad, '$ciudad', '$dni', '$telefono')";

if ($conn->query($sql) === TRUE) {
  echo "Mecánico registrado exitosamente";
} else {
  echo "Error al registrar al mecánico: " . $conn->error;
}


$conn->close();
?>
