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

$sql = "DELETE FROM mecanicos WHERE idmeca = $idmeca";

if ($conn->query($sql) === TRUE) {
    echo "Mecánico eliminado exitosamente";
} else {
    echo "Error al eliminar el mecánico: " . $conn->error;
}

$conn->close();
?>