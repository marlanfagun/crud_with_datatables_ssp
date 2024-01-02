<?php

//Incluir arquivo de configuração
include_once 'config.php';

//Conexão com o banco de dados
// $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// if ($conn->connect_error) {
//     die("Falha ao conectar com o banco de dados" . $conn->connect_error);
// }


try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo 'A conexão falhou: ' . $e->getMessage();
  }