<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "droz_robotica";

$conexao = mysqli_connect($host, $user, $password, $database);

if (!$conexao) {
    die("Erro de conexão: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8mb4");
?>
