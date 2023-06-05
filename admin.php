<!DOCTYPE html>
<html lang="es">

<head>
  <title>ElectroQuantum</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background-image: url('assets/quantum.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }

    .navbar {
      background-color: #FFFF80;
      /* Color de fondo transparente */
      backdrop-filter: blur(64px);
      /* Aplicar efecto de desenfoque al fondo */
      -webkit-backdrop-filter: blur(50px);
      /* Para compatibilidad con Safari */
    }

    .navbar::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: -1;
      background-color: #3434ff;
      opacity: 0.5;
      /* Opacidad de la imagen de fondo */
      filter: blur(50px);
      /* Aplicar desenfoque a la imagen de fondo */
      -webkit-filter: blur(10px);
      /* Para compatibilidad con Safari */
    }

    .container {
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

<body>

  <!-- Deteccion de inicio de sesion -->
  <?php
  session_start();
  if (!$_SESSION['logged_in'] == true) {
    header("Location: controller/logout.php");
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="assets/quantumlogo.svg.png" width="300" height="60" alt="ElectroQuantum">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
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
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card border-dark">
          <div class="card-body">
            <h3 class="card-title text-center">Subir Archivo</h3>
            <form action="controller/guardar.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nombre">Nombre de la Imagen:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre...">
              </div>
              <div class="form-group">
                <label for="link">Link de la Revista:</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="Url de la Revista...">
              </div>
              <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen">
                <button type="submit" class="btn btn-primary">Subir Archivo</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <h1>Panel De Control: Revistas</h1>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Link</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("controller/conexion.php");
          // Consulta para obtener los datos de nombre e imágenes
          $query = "SELECT id, nombre, imagen, link FROM tabla_revista";
          $resultado = $conexion->query($query);

          if ($resultado->num_rows > 0) {
            // Recorrer los resultados y mostrar cada fila de la tabla
            while ($fila = $resultado->fetch_assoc()) {
              $id = $fila['id'];
              $nombre = $fila['nombre'];
              $imagen = $fila['imagen'];
              $link = $fila['link'];
          ?>
              <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $link; ?></td>
                <td>
                  <img src="data:image/jpg;base64, <?php echo base64_encode($imagen); ?>" class="img-fluid">
                </td>
                <td>
                  <a href="#?id=<?php echo $id; ?>" class="btn btn-primary">Modificar</a>
                  <a href="controller/eliminar.php?id=<?php echo $id; ?>" class="btn btn-danger">Eliminar</a>
                </td>
              </tr>
          <?php
            }
          } else {
            echo "No se encontraron resultados en la tabla.";
          }
          $conexion->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="js/bootstrap.min.js"></script>
</body>

</html>
