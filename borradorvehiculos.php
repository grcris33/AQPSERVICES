<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de vehículos</title>
  <link rel="stylesheet" href="estilovehiculos.css">
</head>
<body>
  <header>
    <div class="logo">
      <a href="index.html">
        <img src="logotipo.png" alt="Logo de la empresa">
      </a>
    </div>
    <nav>
      <ul>
        <li><a href="borrador_Inicio.html">Inicio</a></li>
        <li><a href="borrador_Inicio.html#mantenimiento-preventivo">Servicios</a></li>
        <li><a href="borrador_Inicio.html#clientes-satisfechos">Clientes</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="container">
      <h1>Registro de Vehículos</h1>
      <form action="registrar_vehiculo.php" method="post">
        <div class="form-group">
          <label for="marca">Marca del vehículo:</label>
          <select id="marca" name="marca" required>
            <option value="">Seleccione la marca</option>
            <option value="Volvo">Volvo</option>
            <option value="Mercedes-Benz">Mercedes-Benz</option>
            <option value="Hino">Hino</option>
            <option value="Isuzu">Isuzu</option>
            <option value="Mitsubishi">Mitsubishi</option>
            <option value="Hyundai">Hyundai</option>
            <option value="JAC">JAC</option>
            <option value="Foton">Foton</option>
            <option value="Dongfeng">Dongfeng</option>
            <option value="Forland">Forland</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tipo_vehiculo">Tipo de vehículo:</label>
          <select id="tipo_vehiculo" name="tipo_vehiculo" required>
            <option value="">Seleccione el tipo</option>
            <option value="Camión">Camión</option>
            <option value="Bus">Bus</option>
            <option value="Minivan">Minivan</option>
            <option value="SUV">SUV</option>
          </select>
        </div>
        <div class="form-group">
          <label for="transmision">Transmisión:</label>
          <select id="transmision" name="transmision" required>
            <option value="">Seleccione una opción</option>
            <option value="manual">Manual</option>
            <option value="automatica">Automática</option>
          </select>
        </div>
        <div class="form-group">
          <label for="chasis">Número de chasis:</label>
          <input type="text" id="chasis" name="chasis" required>
        </div>
        <div class="form-group">
          <label for="placa">Número de placa:</label>
          <input type="text" id="placa" name="placa" required>
        </div>
        <div class="form-group">
          <label for="kilometraje">Kilometraje:</label>
          <input type="number" id="kilometraje" name="kilometraje" required>
        </div>
        <div class="form-group">
          <label for="combustible">Tipo de combustible:</label>
          <select id="combustible" name="combustible" required>
            <option value="">Seleccione una opción</option>
            <option value="gasolina">Gasolina</option>
            <option value="diesel">Diesel</option>
            <option value="hibrido">Híbrido</option>
            <option value="electrico">Eléctrico</option>
          </select>
        </div>
        <div class="form-group">
          <label for="idcliente">Cliente:</label>
          <select id="idcliente" name="idcliente" required>
            
            <?php
            $conn = new mysqli("localhost", "jefferson", "123", "baseweb2");

            if ($conn->connect_error) {
              die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta para obtener todos los clientes
            $sql = "SELECT idcliente, nombre FROM clientes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["idcliente"] . "'>" . $row["nombre"] . "</option>";
              }
            } else {
              echo "<option value=''>No hay clientes disponibles</option>";
            }

            $conn->close();
            ?>

          </select>
        </div>
        <button type="submit">Registrar vehículo</button>
      </form>
    </div>
  </main>
  <footer>
    <p>&copy; 2024 AQPSERVICE. Todos los derechos reservados.</p>
    <p>Arequipa Perú - aqpservice@aqpservice.com</p>
  </footer>
</body>
</html>
