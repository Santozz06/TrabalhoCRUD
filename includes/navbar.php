<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login/login.php");
    exit();
}
?>
<link rel="stylesheet" href="../css/style.css">

<div class="navbar">
    <h1>Sistema de Veículos</h1>
    <ul>
        <li><a href="../veiculos/veiculos_list.php">Veículos</a></li>
        <li><a href="../marcas/marcas_list.php">Marcas</a></li>
        <li><a href="../login/logout.php">Sair (<?php echo $_SESSION['usuario_nome']; ?>)</a></li>
    </ul>
</div>
