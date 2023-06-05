<?php


// Obtener los datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Verificar las credenciales del usuario en la tabla "tabla_user"
include("conexion.php");

$query = "SELECT * FROM tabla_user WHERE correo = '$correo' AND contrasena = '$contrasena'";
$resultado = $conexion->query($query);

session_start();
if ($resultado->num_rows > 0) {
        // El elemento se eliminó correctamente
        $_SESSION['logged_in'] = true;
        header("Location: ../index.php"); 

} else {
    $_SESSION['logged_in'] = false;
    echo '<script>';
    echo 'alert("Datos Incorrectos");';
    echo 'window.location.href = "../login.php";'; // Redireccionar después de presionar "OK"
    echo '</script>';
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
