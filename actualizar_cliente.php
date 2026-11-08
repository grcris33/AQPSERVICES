<?php

$servername = "localhost";  
$username = "jefferson";      
$password = "123";   
$dbname = "baseweb2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$idcliente = $_POST['idcliente'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$stmt = $conn->prepare("UPDATE clientes SET nombre = ?, apellidos = ?, correo = ?, contrasena = ?, telefono = ?, fecha_nacimiento = ? WHERE idcliente = ?");
$stmt->bind_param("ssssssi", $nombre, $apellidos, $correo, $contrasena, $telefono, $fecha_nacimiento, $idcliente);

if ($stmt->execute() === TRUE) {
    echo "Cliente actualizado exitosamente";
} else {
    echo "Error al actualizar el cliente: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>