<?php
session_start();
if (isset($_GET['cerrar']) && $_GET['cerrar'] === "true") {
  // cerrar sesión
  session_destroy();
  header('Location: index.php');
}

if (!isset($_SESSION['ID'])) {
  header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Privada</title>
</head>
<body>
  <h1>Página Privada</h1>
  Hello! :)  <br>
  <a href="./page-private.php?cerrar=true">Cerrar sesión</a>
</body>
</html>