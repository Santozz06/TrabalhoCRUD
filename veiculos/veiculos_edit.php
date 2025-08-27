<?php
include("../includes/auth.php");
include("../includes/navbar.php");
include("../includes/conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM veiculos WHERE id=$id";
$result = mysqli_query($con, $sql);
$veiculo = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Veículo</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h2 class="page-title">Editar Veículo</h2>

    <form action="veiculos_save.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $veiculo['id']; ?>">
        
        <div class="form-group">
            <label class="form-label">Modelo:</label>
            <input type="text" name="modelo" 
                   value="<?php echo $veiculo['modelo']; ?>" 
                   class="form-input" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Marca:</label>
            <select name="id_marca" class="form-input form-select" required>
                <option value="">Selecione a marca</option>
                <?php
                $marcas = mysqli_query($con, "SELECT * FROM marcas");
                while($m = mysqli_fetch_assoc($marcas)){
                    $selected = ($m['id'] == $veiculo['id_marca']) ? "selected" : "";
                    echo "<option value='".$m['id']."' $selected>".$m['marca']."</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label">Potência:</label>
            <input type="number" name="potencia" 
                   value="<?php echo $veiculo['potencia']; ?>" 
                   class="form-input" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Ano:</label>
            <input type="number" name="ano" 
                   value="<?php echo $veiculo['ano']; ?>" 
                   class="form-input" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Tipo:</label>
            <div class="radio-group">
                <label class="radio-option">
                    <input type="radio" name="tipo" value="Carro" 
                        <?php if($veiculo['tipo']=="Carro") echo "checked"; ?> required> 
                    <i class="fas fa-car"></i> Carro
                </label>
                <label class="radio-option">
                    <input type="radio" name="tipo" value="Moto" 
                        <?php if($veiculo['tipo']=="Moto") echo "checked"; ?>> 
                    <i class="fas fa-motorcycle"></i> Moto
                </label>
                <label class="radio-option">
                    <input type="radio" name="tipo" value="Caminhão" 
                        <?php if($veiculo['tipo']=="Caminhão") echo "checked"; ?>> 
                    <i class="fas fa-truck"></i> Caminhão
                </label>
            </div>
        </div>
        
        <input type="submit" value="Salvar" class="btn">
    </form>
</div>
</body>
</html>
