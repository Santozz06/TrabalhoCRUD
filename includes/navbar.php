<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">
<nav class="navbar">
    <div class="navbar-brand">
        <i class="fas fa-car"></i>
        <span>AutoSystem</span>
    </div>
    <ul class="navbar-nav">
        <li><a href="../veiculos/veiculos_list.php"><i class="fas fa-car-side"></i> Veículos</a></li>
        <li><a href="../marcas/marcas_list.php"><i class="fas fa-cog"></i> Marcas</a></li>
        <li><a href="../login/logout.php"><i class="fas fa-sign-out-alt"></i> Sair (<?php echo $_SESSION['usuario_nome']; ?>)</a></li>
    </ul>
</nav>