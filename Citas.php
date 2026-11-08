<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Citas</title>
    <link rel="stylesheet" href="stylecitas.css">
</head>
<body>
    <div class="container">
        <h2>Agendar Citas</h2>
        <form action="registrar_cita.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="idcliente">Cliente:</label>
                    <select id="idcliente" name="idcliente" required>
                        <?php
                        // Conexión a la base de datos
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
                <div class="form-group">
                    <label for="idvehiculo">Vehículo:</label>
                    <select id="idvehiculo" name="idvehiculo" required>
                        <?php
                        // Conexión a la base de datos
                        $conn = new mysqli("localhost", "jefferson", "123", "baseweb2");

                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Consulta para obtener todos los vehículos
                        $sql = "SELECT idvehiculo, marca, placa FROM vehiculos";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["idvehiculo"] . "'>" . $row["marca"] . " (" . $row["placa"] . ")</option>";
                            }
                        } else {
                            echo "<option value=''>No hay vehículos disponibles</option>";
                        }

                        $conn->close();
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="tecnico">Técnico Mecánico:</label>
                    <select id="tecnico" name="tecnico" required>
                        <option value="Juan Pérez Mamani">Juan Pérez Mamani</option>
                        <option value="José Domínguez Ocolla">José Domínguez Ocolla</option>
                        <option value="Javier Pérez Gómez">Javier Pérez Gómez</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="concesionario">Concesionario:</label>
                    <select id="concesionario" name="concesionario" required>
                        <option value="Concesionario 1">Concesionario 1</option>
                        <option value="Concesionario 2">Concesionario 2</option>
                        <option value="Concesionario 3">Concesionario 3</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="tipo_servicio">Tipo De Servicio:</label>
                    <select id="tipo_servicio" name="tipo_servicio" required>
                        <option value="Mantenimiento Correctivo">Mantenimiento Correctivo</option>
                        <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="detalle">Detalle:</label>
                    <textarea id="detalle" name="detalle"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <select id="ciudad" name="ciudad" required>
                    <option value="Amazonas">Amazonas</option>
                    <option value="Ancash">Ancash</option>
                    <option value="Apurimac">Apurimac</option>
                    <option value="Arequipa">Arequipa</option>
                    <option value="Ayacucho">Ayacucho</option>
                    <option value="Cajamarca">Cajamarca</option>
                    <option value="Callao">Callao</option>
                    <option value="Cusco">Cusco</option>
                    <option value="Huancavelica">Huancavelica</option>
                    <option value="Huanuco">Huanuco</option>
                    <option value="Ica">Ica</option>
                    <option value="Junin">Junin</option>
                    <option value="LaLibertad">La Libertad</option>
                    <option value="Lambayeque">Lambayeque</option>
                    <option value="Lima">Lima</option>
                    <option value="Loreto">Loreto</option>
                    <option value="Madrededios">Madre de Dios</option>
                    <option value="Moquegua">Moquegua</option>
                    <option value="Pasco">Pasco</option>
                    <option value="Piura">Piura</option>
                    <option value="Puno">Puno</option>
                    <option value="SanMartin">San Martín</option>
                    <option value="Tacna">Tacna</option>
                    <option value="Tumbes">Tumbes</option>
                    <option value="Ucayali">Ucayali</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Programar Fecha para Cita:</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="hora">Ingresar La Hora:</label>
                <input type="time" id="hora" name="hora" required>
            </div>
            <div class="form-row buttons">
                <button type="submit">Agendar Cita</button>
                <button type="reset">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>
