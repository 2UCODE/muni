<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está en otro servidor
$usuario_bd = "root"; // Cambia por tu nombre de usuario de MySQL
$contrasena_bd = ""; // Cambia por tu contraseña de MySQL
$nombre_bd = "SMR_muni"; // Cambia por el nombre de tu base de datos

// Crear la conexión
$conexion = new mysqli($host, $usuario_bd, $contrasena_bd, $nombre_bd);

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Establecer el juego de caracteres a utf8 (opcional)
$conexion->set_charset("utf8");
?>
