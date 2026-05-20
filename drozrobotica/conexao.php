<?php
$host = "192.168.0.10";
$user = "root";
$password = "";
$database = "droz_robotica";

$conexao = mysqli_connect($host, $user, $password, $database);

if (!$conexao) {
    die("Erro de conexão: " . mysqli_connect_error());
}
?>