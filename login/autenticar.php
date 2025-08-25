<?php
session_start();

include("../includes/conexao.php"); 
if (!$con) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

if(isset($_POST['login'])){
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']); 
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$usuario'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Erro na consulta SQL: " . mysqli_error($con));
    }

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);

        if($senha === $row['senha']){ 
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nome'] = $row['nome'];
            $_SESSION['logado'] = true;

            header("Location: ../veiculos/veiculos_list.php");
            exit();
        } else {
            echo "<script>alert('Usuário ou senha inválidos'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Usuário ou senha inválidos'); window.location='login.php';</script>";
    }
} else {
    header("Location: login.php");
    exit();
}
?>
