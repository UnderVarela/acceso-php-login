<?php
  $error = ''; 
  // Capturamos envío del formulario mediante php
  if (isset($_POST['log'])) {
    // extract($_POST); //--> seguridad (sanitización)
    $log = htmlspecialchars(trim($_POST['log'])); // trim() limpia los espacios en blanco de izquierda y derecha de un string
    $pwd = htmlspecialchars(trim($_POST['pwd']));
    //validación
    if (empty($log) || empty($pwd)) {
      $error = 'No puede haber campos vacíos';
    } else {
    // Existe el usuario en la base de datos
    // 1º conectar con las base de datos
    require_once('./helpers/conectar-base-datos.php');
    $con = conectarBBDD('localhost', 'under', 'root', '');
    // 2º comprobar que el usuario existe en la base de datos.
    $consulta = "SELECT * FROM wp_users WHERE user_login = '$log'"; // Version demo porque falta añadir la contraseña.
    $sentencia = $con->query($consulta);
    
    if ($sentencia->rowCount()) { //truthy > 0
      // Guardamos la sesión del usuario:
       $fila = $sentencia->fetch();
       $_SESSION['ID'] = $fila['ID']; 

       header('Location: page-private.php');


    } else { // falsy // El usuario no existe en la base de datos.
      $error = "Usuario o password incorrecto";

    }


    }
      
    // $error = 'El usuario '.$log.' no está registrado en el sistema';
    }
    
