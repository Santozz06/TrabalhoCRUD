<?php
include("../includes/navbar.php");
include("../includes/conexao.php");
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <h2>Cadastro de Marca</h2>
    <form action="marcas_save.php" method="POST">
        Marca: <input type="text" name="marca" required>
        <input type="submit" value="Cadastrar" class="btn">
    </form>
</div>
