<?php
include("../includes/auth.php");
include("../includes/conexao.php");


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: marcas_create.php?error=4");
    exit();
}


$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$marca = trim($_POST['marca']);

if (empty($marca)) {
    $redirect = $id ? "marcas_edit.php?id=$id&error=3" : "marcas_create.php?error=3";
    header("Location: $redirect");
    exit();
}

$check_sql = "SELECT id FROM marcas WHERE marca = ? AND id != ?";
$stmt = mysqli_prepare($con, $check_sql);
mysqli_stmt_bind_param($stmt, "si", $marca, $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    $redirect = $id ? "marcas_edit.php?id=$id&error=2" : "marcas_create.php?error=2";
    header("Location: $redirect");
    exit();
}

if ($id) {
    $sql = "UPDATE marcas SET marca = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "si", $marca, $id);
    $action = 'atualizada';
} else {
    $sql = "INSERT INTO marcas (marca) VALUES (?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $marca);
    $action = 'cadastrada';
}

if (mysqli_stmt_execute($stmt)) {
    $redirect = $id ? "marcas_edit.php?id=$id&success=1" : "marcas_create.php?success=1";
    header("Location: $redirect");
    exit();
} else {
    $redirect = $id ? "marcas_edit.php?id=$id&error=1" : "marcas_create.php?error=1";
    header("Location: $redirect");
    exit();
}

mysqli_stmt_close($stmt);
?>