<?php
include("conexion.php");
$conexion->query("SET SESSION wait_timeout = 3600");

$nombre = $_POST['nombre'];
$imagen = $_FILES['imagen']['tmp_name'];
$link = $_POST['link'];

if (!empty($nombre) && !empty($imagen) && !empty($link)) {
    $imagen_data = file_get_contents($imagen);

    $query = "INSERT INTO tabla_revista(nombre, imagen, link) VALUES (?, ?, ?)";

    $stmt = $conexion->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sss", $nombre, $imagen_data, $link);

        // Reestablecer la conexión
        $conexion->ping();

        if ($stmt->execute()) {
            echo '<script>';
            echo 'alert("Datos Guardados exitosamente");';
            echo 'window.location.href = "../admin.php";'; // Redireccionar después de presionar "OK"
            echo '</script>';

        } else {        
            echo '<script>';
            echo "Error al guardar: " . $conexion->error;
            echo 'window.location.href = "../admin.php";'; // Redireccionar después de presionar "OK"
            echo '</script>';
        }

        $stmt->close();
    } else { 
        echo '<script>';
        echo "Error en la preparación de la consulta: " . $conexion->error;
        echo 'window.location.href = "../admin.php";'; // Redireccionar después de presionar "OK"
        echo '</script>';
    }
} else {
    echo '<script>';
    echo 'alert("Faltan datos");';
    echo 'window.location.href = "../admin.php";'; // Redireccionar después de presionar "OK"
    echo '</script>';
    
}

$conexion->close();
