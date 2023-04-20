<?php


function conectarBBDD (string $host, string $dbname, string $username, string $password) {

  try {
    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  } catch (PDOException $err) {
    die($err->getMessage(). '. Consulta con el administrador');
  }

}