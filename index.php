<?php
session_start();

if (isset($_SERVER['ID'])) {
 header('Location: page-private.php');
}

?>

<!-- 
  Hacer html
  Hacer CSS
  Si el html es de validación:

    - Capturar el envío de datos
    - validar los controles de formulario obligatorios o que tengan que cumplir un requisito y según reglas del negocio
      - Que los campos rellenados se mantengan
      - Que se escriban los mensajes de error si se producen
 -->

 <!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/login.min.css">
  <link rel="stylesheet" href="assets/style.css">

</head>

<body class="login">
  <div class="container">
    <?php
    // Script validacion formulario:
    // - Declaracion aquí la variable $error. 
    // - conexion a BBDD.
    require_once('./includes/formulario-validacion-acceso.php');
    ?>

    <?php
      if (!empty($error)) {
    ?>
    <!--Mensaje Error  -->
    <div id="login_error">
      ERROR!
      <?=$error?>
    </div>  
    <!-- // End Mensaje Error -->
    <?php
      }
    ?>

    <form name="loginform" id="loginform" method="post">
      <p>
        <label for="user_login">Nombre de usuario o correo electrónico</label>
        <input
         value="<?=$_POST['log']??"" // Condicional nullish -->evalúa sólo null, undefined?>" 
         type="text" 
         name="log" 
         id="user_login" 
         aria-describedby="login-message" 
         class="input" 
         size="20" 
         autocapitalize="off" 
         autocomplete="username">
      </p>
      <div class="user-pass-wrap">
        <label for="user_pass">Contraseña</label>
        <div class="wp-pwd">
          <input
           value="<?=$pwd??''?>"
           type="password" 
           name="pwd" 
           id="user_pass" 
           aria-describedby="login-message" 
           class="input password-input" 
           size="20" 
           autocomplete="current-password" 
           spellcheck="false"
          >
          <button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Mostrar la contraseña">
            <span class="dashicons dashicons-visibility" aria-hidden="true"></span>
          </button>
        </div>
      </div>
      <p class="forgetmenot">
        <input 
          <?=isset($_POST['rememberme']) ? 'checked' : ''?>
          name="rememberme" 
          type="checkbox" 
          id="rememberme" 
          value="forever"
        > <label for="rememberme">Recuérdame</label></p>
      <p class="submit">
        <input 
         type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Acceder" />
    
      </p>
    </form>
  </div>

</body>

</html>