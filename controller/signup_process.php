<?php
// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$estado = $_POST['estado'];

// Insertar los datos en la tabla "tabla_user"
include("conexion.php");

$query = "INSERT INTO tabla_user (nombre, correo, contrasena, estado) VALUES ('$nombre', '$correo', '$contrasena', '$estado')";
if ($conexion->query($query) === TRUE) {
    echo '<script>';
    echo 'alert("Registro Exitoso");';
    echo 'window.location.href = "../login.php";'; // Redireccionar después de presionar "OK"
    echo '</script>';
} else {
    echo '<script>';
    echo 'alert("Datos Incorrectos");';
    echo 'window.location.href = "../signup.php";'; // Redireccionar después de presionar "OK"
    echo '</script>';
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
