<?php

$servername = "localhost";  
$username = "jefferson";      
$password = "123";   
$dbname = "baseweb2"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$idmeca = $_POST['idmeca'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$ciudad = $_POST['ciudad-nacimiento'];
$dni = $_POST['dni'];
$telefono = $_POST['telefono'];

$sql = "UPDATE mecanicos SET nombre='$nombre', edad=$edad, ciudad='$ciudad', dni='$dni', telefono='$telefono' WHERE idmeca=$idmeca";

if ($conn->query($sql) === TRUE) {
    echo "Mecánico actualizado exitosamente";
} else {
    echo "Error al actualizar el mecánico: " . $conn->error;
}

$conn->close();
?>