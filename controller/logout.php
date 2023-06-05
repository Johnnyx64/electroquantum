<?php
session_start();
session_destroy();
$_SESSION['logged_in'] = false;
// Redirigir al usuario a la página de inicio o a otra página de tu elección
header("Location: ../login.php");
exit();
?>


