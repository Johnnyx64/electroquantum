<!DOCTYPE html>
<html>
<head>
  <title>Contacto</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
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

    .contact-section {
      padding: 80px 0;
      background-color: #fffff;
    }

    .contact-heading {
      font-size: 36px;
      font-weight: bold;
      color: #333;
      margin-bottom: 40px;
    }

    .contact-form {
      max-width: 500px;
      margin: 0 auto;
    }

    .form-control {
      background-color: #f2f2f2;
      color: #333;
    }

    .btn-contact {
      background-color: #ff6b6b;
      border-color: #ff6b6b;
      color: #fff;
      font-weight: bold;
    }

    .btn-contact:hover {
      background-color: #ff4f4f;
      border-color: #ff4f4f;
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
<!-- Navbar -->
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


<!-- Contacto -->
<section class="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="contact-heading">Contacto</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <form class="contact-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nombre">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Correo electrónico">
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="5" placeholder="Mensaje"></textarea>
          </div>
          <button type="submit" class="btn btn-contact">Enviar mensaje</button>
        </form>
      </div>
    </div>
  </div>
</section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
