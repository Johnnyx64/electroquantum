<!DOCTYPE html>
<html>
<head>
  <title>Registrarse</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      background-image: url("assets/blue.jpg"); /* Ruta de tu imagen JPG */
      background-repeat: no-repeat;
      background-size: cover;
    }

    .container{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    </style>
</head>

                   
<div class="container">
<div class="col-sm-10 col-md-5 bg-white border rounded p-4 shadow-sm">
            <form method="post" action="controller/signup_process.php">
            <div class="d-flex justify-content-center">
                    <img class="mb-4" src="assets\Qnlogo.png" alt="" widht="400" height="55">
                </div>
      <h1 class="text-center">Registrarse</h1>
      <form action="controller/signup_process.php" method="POST">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo electrónico:</label>
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="mb-3">
          <label for="contrasena" class="form-label">Contraseña:</label>
          <input type="password" class="form-control" id="contrasena" name="contrasena" required>
        </div>
        <div class="mb-3">
          <label for="estado" class="form-label">Estado de la suscripción:</label>
          <select class="form-select" id="estado" name="estado" required>
            <option value="VIP">VIP</option>
            <option value="premium">PREMIUM</option>
            <option value="free">FREE</option>
          </select>
        </div>

        <div style="display: flex; justify-content: center; align-items: center;">
      <button type="submit" class="btn btn-primary">Crear cuenta</button>
      <div style="margin-left: 50px;"></div> <!-- Espacio considerable -->
      <a href="login.php" class="btn btn-primary">Iniciar sesión</a>
    </div>
  </form>
</div>


      </form>
    </div>
  </div>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
