<?php
$servername = "localhost";
$username = "jefferson";
$password = "123";
$dbname = "baseweb2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$idcliente = $_GET['idcliente'];

$sql = "SELECT idvehiculo, marca, placa FROM vehiculos WHERE idcliente = '$idcliente'";
$result = $conn->query($sql);

$vehiculos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vehiculos[] = $row;
    }
}

$conn->close();

echo json_encode($vehiculos);
?>
