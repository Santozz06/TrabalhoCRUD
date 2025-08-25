<?php
include("../includes/navbar.php");
include("../includes/conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM marcas WHERE id=$id";
$result = mysqli_query($con, $sql);
$marca = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <h2>Editar Marca</h2>
    <form action="marcas_save.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $marca['id']; ?>">
        Marca: <input type="text" name="marca" value="<?php echo $marca['marca']; ?>" required>
        <input type="submit" value="Salvar" class="btn">
    </form>
</div>
