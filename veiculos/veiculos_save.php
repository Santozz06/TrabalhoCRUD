<?php
include("../includes/conexao.php");

$id = $_POST['id'] ?? '';
$modelo = $_POST['modelo'];
$id_marca = $_POST['id_marca'];
$potencia = $_POST['potencia'];
$ano = $_POST['ano'];
$tipo = $_POST['tipo'];

if($id){ // update
    $sql = "UPDATE veiculos SET modelo='$modelo', id_marca=$id_marca, potencia=$potencia, ano=$ano, tipo='$tipo' WHERE id=$id";
}else{ // insert
    $sql = "INSERT INTO veiculos (modelo, id_marca, potencia, ano, tipo) VALUES ('$modelo',$id_marca,$potencia,$ano,'$tipo')";
}

if(mysqli_query($con, $sql)){
    echo "<script>alert('Veículo salvo com sucesso'); window.location='veiculos_list.php';</script>";
}else{
    echo "<script>alert('Erro ao salvar veículo'); window.location='veiculos_list.php';</script>";
}
