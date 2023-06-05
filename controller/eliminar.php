<?php
// Verificar si se recibió el parámetro "id" en la URL
if (isset($_GET['id'])) {
    // Obtener el ID del elemento a eliminar
    $id = $_GET['id'];

    // Realizar la conexión a la base de datos
    include("conexion.php");

    // Consulta SQL para eliminar el elemento
    $query = "DELETE FROM tabla_revista WHERE id = $id";

    // Ejecutar la consulta
    if ($conexion->query($query)) {
        // El elemento se eliminó correctamente
        header("Location: ../admin.php"); 
    } else {
        // Ocurrió un error al eliminar el elemento
        echo '<script>';
        echo 'alert("Ocurrió un error al eliminar el elemento");';
        echo 'window.location.href = "../admin.php";'; // Redireccionar después de presionar "OK"
        echo '</script>';
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se recibió el parámetro "id" en la URL, mostrar un mensaje de error
    echo '<script>';
    echo 'alert("Faltan Datos (id)");';
    echo 'window.location.href = "../admin.php";'; // Redireccionar después de presionar "OK"
    echo '</script>';
}
?>
