<?php
include("../includes/conexao.php");

$id = $_POST['id'] ?? '';
$marca = $_POST['marca'];

if($id){ // update
    $sql = "UPDATE marcas SET marca='$marca' WHERE id=$id"; 
}else{ // insert
    $sql = "INSERT INTO marcas (marca) VALUES ('$marca')";
}

if(mysqli_query($con, $sql)){
    echo "<script>alert('Marca salva com sucesso'); window.location='marcas_list.php';</script>";
}else{
    echo "<script>alert('Erro ao salvar marca'); window.location='marcas_list.php';</script>";
}
