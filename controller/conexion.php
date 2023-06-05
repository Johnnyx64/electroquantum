<?php

$servername = 'us-cdbr-east-06.cleardb.net';
$username = 'bb0ef7a396b2ed';
$password = 'b54164c6';
$database = 'heroku_ddef5b8e450587a';

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $database);

$conexion->options(MYSQLI_OPT_CONNECT_TIMEOUT, 120); // Aumenta el tiempo de espera a 120 segundos

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Error al conectar a la base de datos: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8");

// Verificar si la conexión se estableció correctamente
 if ($conexion) {
    echo "Conexión exitosa a la base de datos!";
} else {
    echo "Error al conectar a la base de datos.";
}

// Cerrar la conexión
 //$conexion->close();
?>
