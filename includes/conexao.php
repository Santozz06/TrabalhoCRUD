<?php
$host = "localhost";
$user = "root";
$pass = "";
$bdname = "sistema_veiculos";

$con = mysqli_connect($host, $user, $pass, $bdname);

if (!$con) {
    die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
}
?>
