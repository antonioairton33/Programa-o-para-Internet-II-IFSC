<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "cadastro";
$port = 3307;

$conexao = new mysqli($host, $user, $password, $database, $port);

if($conexao->connect_error){
    die("Erro na conexão: " . $conexao->connect_error);
}

?>