<?php
require_once("../vista/header.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['Usuario'])) {
        header("Location: login.php");
        exit();
    }

    $dni_usuario = $_SESSION['usuario'];

    require_once('../Conexion/conexion.php');

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Consulta para obtener las oficinas o módulos asociados al usuario
    $query = "SELECT OficinaModulo.idOficinaModulo, OficinaModulo.nombreOficinaModulo 
              FROM OficinaModulo 
              INNER JOIN Usuario ON OficinaModulo.idOficinaModulo = Usuario.idUsuario 
              WHERE Usuario.numeroDocumento = ?";

    // Preparar la consulta
    if ($stmt = $conexion->prepare($query)) {
        // Vincular el parámetro
        $stmt->bind_param("s", $dni_usuario);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado de la consulta
        $result = $stmt->get_result();
    } else {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }
    ?>

    <div class="container my-4">
        <h2 class="mb-4">Seleccione la Oficina o Módulo:</h2>
        <form method="post" action="" class="form-inline">
            <div class="form-group mb-2">
                <label for="idOficinaModulo" class="mr-2">Oficina o Módulo:</label>
                <select name="idOficinaModulo" id="idOficinaModulo" class="form-control">
                    <?php
                    // Generar opciones del select con las oficinas o módulos asociados al usuario
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['idOficinaModulo'] . "'>" . $row['nombreOficinaModulo'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Mostrar Detalles</button>
        </form>

        <?php
        // Verificar si se seleccionó una oficina o módulo
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener el idOficinaModulo seleccionado
            if (isset($_POST['idOficinaModulo'])) {
                $idOficinaModulo = $_POST['idOficinaModulo'];

                // Consulta para obtener los detalles de la oficina o módulo seleccionado
                $query = "SELECT idOficinaModulo, nombreOficinaModulo, tiempoAtencion FROM OficinaModulo WHERE idOficinaModulo = ?";
                if ($stmt = $conexion->prepare($query)) {
                    $stmt->bind_param("s", $idOficinaModulo);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Mostrar detalles de la oficina o módulo
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<h2 class='mt-4'>Detalles de la Oficina o Módulo</h2>";
                        echo "<table class='table table-bordered'>";
                        echo "<tr><th>ID de Oficina o Módulo</th><td>" . $row['idOficinaModulo'] . "</td></tr>";
                        echo "<tr><th>Nombre</th><td>" . $row['nombreOficinaModulo'] . "</td></tr>";
                        echo "<tr><th>Tiempo de Atención</th><td>" . $row['tiempoAtencion'] . " minutos</td></tr>";
                        echo "</table>";
                    } else {
                        echo "<p>No se encontraron detalles para la oficina o módulo seleccionado.</p>";
                    }
                } else {
                    echo "<p>Error en la preparación de la consulta de oficina o módulo: " . $conexion->error . "</p>";
                }
            }
        }

        // Cerrar conexión
        $conexion->close();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js
