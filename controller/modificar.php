<?php
// Verificar si se recibió el parámetro "id" en la URL
if (isset($_GET['id'])) {
    // Obtener el ID del elemento a modificar
    $id = $_GET['id'];

    // Realizar la conexión a la base de datos
    include("conexion.php");

    // Consulta SQL para obtener los datos del elemento a modificar
    $query = "SELECT id, nombre FROM tabla_revista WHERE id = $id";
    $resultado = $conexion->query($query);

    // Verificar si se encontró el elemento
    if ($resultado->num_rows > 0) {
        // Obtener los datos del elemento
        $fila = $resultado->fetch_assoc();
        $nombre = $fila['nombre'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Registro</title>
</head>
<body>
    <h1>Modificar Registro</h1>

    <form method="POST" action="actualizar.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>

<?php
    } else {
        // Si no se encontró el elemento, mostrar un mensaje de error
        echo '<script>';
        echo 'alert("El elemento no existe");';
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
