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

  <!-- Mensaje error -->
  <?php
  if(isset($error) && count($error)):?>

  <div id="login_error">
    ERROR!
  <?=join('<br>', $error)?>  
  </div>
  <?php endif;?>

  <!-- End mensaje error -->

  
    <form name="loginform" id="loginform" method="post">
        <p>
          <label for="user_login">Nombre de usuario o correo electrónico</label>
          <input value="<?=$log??''?>" type="text" name="log" id="user_login" class="input" size="20" autocapitalize="off" autocomplete="username" />
        </p>
        <div class="user-pass-wrap">
          <label for="user_pass">Contraseña</label>
          <div class="wp-pwd">
            <input value="<?=$pwd??''?>" type="password" name="pwd" id="user_pass" class="input password-input" size="20" autocomplete="current-password" spellcheck="false" />
            <button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Mostrar la contraseña">
              <span class="dashicons dashicons-visibility" aria-hidden="true"></span>
            </button>
          </div>
        </div>
              <p class="forgetmenot"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> <label for="rememberme">Recuérdame</label></p>
        <p class="submit">
          <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Acceder" />
        </p>

		</form>
    </div>
</body>
</html>