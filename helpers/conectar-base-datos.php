<?php
/**
 * Permite la conexion a una base de datos
 * 
 * @param { string } Nombre del servidor de la BBDD
 * @param { string } Nombre de la BBDD
 * @param { string } Nombre del usuario de la BBDD
 * @param { string } Contraseña del usuario de la BBDD
 */

function conectarBBDD (string $host, string $dbname, string $username, string $password): void {
global $con;
$con = null;
  try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  } catch (PDOException $err) {
    die($err->getMessage(). '. Consulta con el administrador');
  }

}