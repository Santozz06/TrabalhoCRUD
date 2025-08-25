<?php
include("../includes/conexao.php");

$id = $_GET['id'];
$sql = "DELETE FROM marcas WHERE id=$id";
if(mysqli_query($con, $sql)){
    echo "<script>alert('Marca excluída com sucesso'); window.location='marcas_list.php';</script>";
}else{
    echo "<script>alert('Erro ao excluir marca'); window.location='marcas_list.php';</script>";
}
