<?php
session_start();

if (isset($_POST['wp-submit'])) {
  // Validar formulario
  $error = [];
  extract($_POST);
  // Sanitizar el código
  $log = htmlspecialchars($log);
  if(empty($log) || empty($pwd)) {
    array_push($error, 'No puede haber campos en blanco');
  }

  // Valido en la BBDD
  // Crear Sesión
  // $_SESSION['autentificado'] = true;
}

if(isset($_SESSION['autentificado']) && $_SESSION['autentificado'] === true)
  require_once('./views/private-view.php');
else
  require_once('./views/access-view.php');