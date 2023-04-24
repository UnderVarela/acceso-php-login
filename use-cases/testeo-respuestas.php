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
