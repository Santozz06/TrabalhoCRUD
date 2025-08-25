<?php
include("../includes/conexao.php");

$id = $_GET['id'];
$sql = "DELETE FROM veiculos WHERE id=$id";
if(mysqli_query($con, $sql)){
    echo "<script>alert('Veículo excluído com sucesso'); window.location='veiculos_list.php';</script>";
}else{
    echo "<script>alert('Erro ao excluir veículo'); window.location='veiculos_list.php';</script>";
}
