<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>Fundamentos php</title>
</head>
<body>
  
<h1>Cuestionario</h1>
    <?php
    require_once('./preguntas.php');
    $aciertos = 0;
    // Comprobar respuestas
    foreach($preguntas as $pregunta) {
      $key = $pregunta['name']; 
      if (isset($_POST[$key]) && $_POST[$key] == $pregunta['respuesta']) {
        $aciertos++;
      }
    }

    echo isset($_POST['submit']) ? "<mark>Número de aciertos $aciertos</mark>" : '  ';
    ?>

<form method="post">
<?php
    foreach ($preguntas as $pregunta):
      extract($pregunta);  // <-- $pregunta, $respuesta, $input, $name
    ?>
      <div class="preguntas">
        <p><strong><?=$pregunta?></strong></p>
        <?php
        foreach ($input as $key => $texto) {
          $checked = isset($_POST[$name]) && $_POST[$name] == ($key+1) ? 'checked': '';
          printf('<p><input %s type="radio" name="%s" value="%d">&nbsp;%s</p>',
                  $checked,
                  $name,
                  ($key+1),
                  $texto);
        }
        ?>
      </div>
    <?php 
    endforeach;
    ?>   
    <input name="submit" type="submit" value="Enviar">
  </form>
</body>
</html>