<!DOCTYPE html>
<html lang="es">

<head>
  <title>ElectroQuantum</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarjeta de Suscripción</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
     body {
      background-image: url('assets/quantum.jpg'); background-repeat: no-repeat; background-size: cover;">
      background-repeat: no-repeat;
      background-size: cover;
    }

    .navbar {
    background-color: #FFFF80; /* Color de fondo transparente */
    backdrop-filter: blur(64px); /* Aplicar efecto de desenfoque al fondo */
    -webkit-backdrop-filter: blur(50px); /* Para compatibilidad con Safari */
}

.navbar::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    background-color:#3434ff; 
    opacity: 0.5; /* Opacidad de la imagen de fondo */
    filter: blur(50px); /* Aplicar desenfoque a la imagen de fondo */
    -webkit-filter: blur(10px); /* Para compatibilidad con Safari */
}
    
    {
      background-color: #f8f9fa;
    }

    .card {
      width: 300px;
      margin: 0 auto;
      margin-top: 100px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      background-color: #e1ffff;
    }

    .card-header {
      background-color: #f6c23e;
      color: #c7ffff;
      text-align: center;
      padding: 20px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .card-body {
      padding: 20px;
    }

    .card-title {
      font-size: 24px;
      font-weight: bold;
      color: #333333;
      text-align: center;
    }

    .card-subtitle {
      color: #888888;
      text-align: center;
    }

    .gold-icon {
      color: #ffd700;
      font-size: 24px;
      text-align: center;
      margin-top: 20px;
    }
  </style>

</head>

<!-- Deteccion de inicio de sesion -->
<?php
session_start();
if (!$_SESSION['logged_in'] == true) {
  header("Location: controller/logout.php");
}
?>
<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
    <img src="assets\Qnlogo.png" width="300" height="60" alt="ElectroQuantum">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cuenta.php">Cuenta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
        </li>
              <div class="text-center">
        <a href="controller/logout.php" class="btn btn">
          <i class="fas fa-sign-out-alt"></i> Salir
        </a>
      </div>
      </ul>
    </div>
  </nav>



 <?php

include("controller/conexion.php");
// Realizar la consulta SQL para obtener los datos de la tabla_user
$query = "SELECT * FROM tabla_user";
$result = mysqli_query($conexion, $query);

// Verificar si se encontraron registros
if (mysqli_num_rows($result) > 0) {
    // Crear un array para almacenar los registros
    $registros = array();

    // Recorrer los registros y almacenarlos en el array
    while ($row = mysqli_fetch_assoc($result)) {
        $registros[] = $row;
    }
} else {
    echo "No se encontraron registros.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>


<div class="card mx-auto">
    <div class="card-header text-center">
        <h5 class="card-title">Suscripción</h5>
    </div>
    <div class="card-body text-center">
        <?php foreach ($registros as $registro) { ?>
            <h6 class="card-subtitle">Nombre del Usuario</h6>
            <p class="card-text"><?php echo $registro['nombre']; ?></p>
            <h6 class="card-subtitle">Correo Electrónico</h6>
            <p class="card-text"><?php echo $registro['correo']; ?></p>
            <h6 class="card-subtitle">Nivel de Suscripción</h6>
            <p class="card-text"><?php echo $registro['estado']; ?></p>
            <div class="gold-icon">
                <i class="fas fa-crown"></i>
            </div>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>