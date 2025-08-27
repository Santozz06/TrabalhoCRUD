<?php
include("../includes/auth.php");
include("../includes/navbar.php");
include("../includes/conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM marcas WHERE id=$id";
$result = mysqli_query($con, $sql);
$marca = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Marca</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h2 class="page-title">Editar Marca</h2>

    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> Marca atualizada com sucesso!
        </div>
    <?php elseif(isset($_GET['error'])): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-triangle"></i> 
            Erro: <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
    <?php endif; ?>

    <form action="marcas_save.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $marca['id']; ?>">
        
        <div class="form-group">
            <label class="form-label">Nome da Marca:</label>
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-tag"></i>
                <input type="text" name="marca" 
                       value="<?php echo $marca['marca']; ?>" 
                       class="form-input" required>
            </div>
        </div>
        
        <input type="submit" value="Salvar" class="btn">
    </form>
</div>
</body>
</html>
