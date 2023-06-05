<!DOCTYPE html>
<html>
<head>
  <title>ElectroQuantum</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
</head>
<body style="background-image: url('assets/quantum.jpg'); background-repeat: no-repeat; background-size: cover;">

<style>

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



</style>

<!-- Deteccion de inicio de sesion -->
<?php
session_start();
if (!$_SESSION['logged_in'] == true) {
  header("Location: controller/logout.php");
}
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
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
  
  <style>
  /* Estilo para h1 */
  h1 {
    color: white; /* Color de texto rojo */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente Arial o una fuente sans-serif similar */
    /* Otros estilos que desees aplicar */
  }

  h2 {
    color: white; /* Color de texto rojo */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente Arial o una fuente sans-serif similar */
    /* Otros estilos que desees aplicar */
  }
  </style>

  <h1 class="text-center">¡Bienvenido! ¡Gracias por suscribirte!</h1>
  <h2 class="text-center">¡Ahora podrás disfrutar del exclusivo contenido de nuestras revistas de científicos famosos de Electromagnetismo y Mecánica Cuántica!</h2>



<style>
.card:hover {
  box-shadow: 0 0 40px rgba(0, 0, 0, 0.8);
}
</style>


<div class="container">
    <div class="row">

        <?php
        include("controller/conexion.php");
        // Consulta para obtener los datos de nombre e imágenes
        $query = "SELECT id, nombre, imagen, link FROM tabla_revista";
        $resultado = $conexion->query($query);

        if ($resultado->num_rows > 0) {
            // Iterar sobre los datos y mostrar cada revista
            while ($fila = $resultado->fetch_assoc()) {
                $id = $fila['id'];
                $nombre = $fila['nombre'];
                $imagen = $fila['imagen'];
                $link = $fila['link'];
                ?>
                <div class="col-md-3 mb-1">
                <div class="text-center">
                <h1>   </h1>
                </div>
                    <a href="<?php echo $link; ?>"target="_blank" class="card border-0 bg-light text-dark">
                        <img src="data:image/jpg;base64, <?php echo base64_encode($imagen); ?>" class="card-img-top rounded img-fluid" alt="Imagen de la revista">
                    </a>
                </div>
                <?php
            }
        } else {
            echo "No se encontraron resultados en la tabla.";
        }
        ?>
    </div>
</div>




</div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
