<?php

$servername = "localhost";  
$username = "jefferson";      
$password = "123";   
$dbname = "baseweb2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

$marca = $_POST['marca'];
$tipo_vehiculo = $_POST['tipo_vehiculo'];
$transmision = $_POST['transmision'];
$chasis = $_POST['chasis'];
$placa = $_POST['placa'];
$kilometraje = $_POST['kilometraje'];
$combustible = $_POST['combustible'];
$idcliente = $_POST['idcliente'];

$sql = "INSERT INTO vehiculos (marca, tipo_vehiculo, transmision, chasis, placa, kilometraje, combustible, idcliente)
VALUES ('$marca', '$tipo_vehiculo', '$transmision', '$chasis', '$placa', $kilometraje, '$combustible', $idcliente)";

if ($conn->query($sql) === TRUE) {
  echo "Vehículo registrado exitosamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
