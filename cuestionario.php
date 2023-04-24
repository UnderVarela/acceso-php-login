<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>Cuestionario PHP</title>
</head>

<?php 
$aciertos = 0;
foreach($_POST as $value) {
  if($value === 'true')
    $aciertos++;
}
?>

<?php
echo isset($_POST['submit']) ? "<mark>Numero de aciertos $aciertos</mark>": '';
?>

<body>
  <h1>Fundamentos de PHP</h1>
  <form method="post "action="">
    <?php
     require_once('./preguntas.php');
     foreach ($preguntas as $pregunta) :
        extract($pregunta); // <--$pregunta, $respuesta, $input, $name
    ?>
    <fieldset>
      <legend>CUESTIONARIO</legend>
      <div class="preguntas">
        <p><?=$pregunta?></p>
        <?php
        foreach($input as $key => $texto) {
          $checked = isset($_POST[$name]) && $_POST[$name] == ($key+1) ? 'checked': '';
          printf('<p><input %s type="radio" name="%s" value="%d">%s</p>',
          $checked,
          $name, 
          ($key+1), 
          $texto);
        }
        ?>
      </div>
      <?php endforeach; ?>
      
      <div class="preguntas">
        <p><?=$pregunta?></p>
        <?php
        foreach($input as $input) {
          $checked = isset($_POST['res2']) && $_POST['res2'] === $input['value'] ? 'checked': '';
          printf('<p><input %s type="radio" name="res2" value="%s">%s</p>',$checked, $input['value'], $input['texto']);
        }
        ?>
      </div>
      
      <div class="preguntas">
        <p></p>
        <?php
        foreach($inputs as $input) {
          $checked = isset($_POST['res3']) && $_POST['res3'] === $input['value'] ? 'checked': '';
          printf('<p><input %s type="radio" name="res3" value="%s">%s</p>',$checked, $input['value'], $input['texto']);
        }
        ?>
      </div>
      
      <div class="preguntas">
        <p></p>
        <?php
        foreach($inputs as $input) {
          $checked = isset($_POST['res4']) && $_POST['res4'] === $input['value'] ? 'checked': '';
          printf('<p><input %s type="radio" name="res4" value="%s">%s</p>',$checked, $input['value'], $input['texto']);
        }
        ?>
      </div>
     
      <div class="preguntas">
        <p></p>
        <?php
        foreach($inputs as $input) {
          $checked = isset($_POST['res5']) && $_POST['res5'] === $input['value'] ? 'checked': '';
          printf('<p><input %s type="radio" name="res4" value="%s">%s</p>',$checked, $input['value'], $input['texto']);
        }
        ?>
      </div>
    </fieldset>
    <input name="form-submit" type="submit" value="Enviar">
  </form>
</body>

</html>