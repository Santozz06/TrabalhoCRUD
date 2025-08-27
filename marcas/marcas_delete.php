<?php
include("../includes/auth.php");
include("../includes/conexao.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('ID inválido ou não informado'); window.location='marcas_list.php';</script>";
    exit();
}

$id = intval($_GET['id']);
$sql = "DELETE FROM marcas WHERE id=$id";
if(mysqli_query($con, $sql)){
    echo "<script>alert('Marca excluída com sucesso'); window.location='marcas_list.php';</script>";
}else{
    echo "<script>alert('Erro ao excluir marca'); window.location='marcas_list.php';</script>";
}
