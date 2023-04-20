<!-- Lo archivos originales son los que llevan la X  
Hacer HTML
Hacer CSS
Si el html es de validacion
  - Capturar el envío de datos.
  - Validar controles de formulario obligatorios o que tenga que cumplir un requisitos y segun las reglas de negocio
    - Que los campos rellenados se mantengan
    - Que se escriban los mensajes de error si se producen.

-->

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
  <link rel="stylesheet" href="assets/login.min.css">
  <style> 
    .login {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    #loginform {
      max-width: 340px;
    }
    #wp-submit {
      padding: .3rem .5rem;
    }
  </style>
  <title>Login</title>
</head>
<body class="login">
<div class="container">

  <?php 
    $error = '';
    // Capturamos el envio del formulario mediante php
    if(isset($_POST['wp-submit'])) {
      extract($_POST);
      // Validación
      if (empty($log) || empty($pwd)) {
        $error = 'No puede haber campos vacíos';
      } else {
      // Intentar loguear
      //  conexion()
      
        function conexion_db (
          string $servername = 'localhost', 
          string $username = 'root',
          string $dbname = 'acceso',
          string $password='') {
            
            try {
              $connection = new PDO ("mysql:host=$servername;dbname=$dbname;", $username, $password);
              
            } catch (PDOException $err) {
              die($err->getMessage().'. Consulte con el administrador del sistema');
            }
        }

    conexion_db('localhost', 'root', '');

      // $servername = 'localhost';
      // $username = 'root';
      // $password = '';
      // $dbname = 'under';

      
      // $error = 'El usuario '.$log.' no está registrado en el sistema.';
      }
      
    }
    
    ?>

<!-- Mensaje error -->
<?php
  if(!empty($error)) {
?>
<div id="login_error">
  ERROR!
<?=$error??''?>
</div>
<!-- End mensaje error -->
  <?php 
  } // el endif; equivale a esto
  ?>
    <form name="loginform" id="loginform" method="post">
        <p>
          <label for="user_login">Nombre de usuario o correo electrónico</label>
          <input 
          value="<?=$_POST['log']??""?>"  
          type="text" 
          name="log" 
          id="user_login" 
          class="input" 
          size="20" 
          autocapitalize="off" 
          autocomplete="username" />
        </p>
        <div class="user-pass-wrap">
          <label for="user_pass">Contraseña</label>
          <div class="wp-pwd">
            <input 
            value="<?=$_POST['pwd']??""?>" 
            type="password" 
            name="pwd" 
            id="user_pass" 
            class="input password-input" 
            size="20" 
            autocomplete="current-password" 
            spellcheck="false" />
            <button 
            type="button" 
            class="button button-secondary wp-hide-pw hide-if-no-js" 
            data-toggle="0" 
            aria-label="Mostrar la contraseña">
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
              value="forever"  /> <label for="rememberme">Recuérdame</label></p>
        <p class="submit">
          <input 
          type="submit" 
          name="wp-submit" 
          id="wp-submit" 
          class="button button-primary button-large" 
          value="Acceder" />
        </p>

		</form>
    </div>
</body>
</html>