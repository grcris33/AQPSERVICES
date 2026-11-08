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

$sql = "DELETE FROM clientes WHERE idcliente = $idcliente";

if ($conn->query($sql) === TRUE) {
    echo "Cliente eliminado exitosamente";
} else {
    echo "Error al eliminar el cliente: " . $conn->error;
}

$conn->close();
?>