<?php
include("../includes/navbar.php");
include("../includes/conexao.php");

$id = $_GET['id'];
$sql = "SELECT * FROM veiculos WHERE id=$id";
$result = mysqli_query($con, $sql);
$veiculo = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <h2>Editar Veículo</h2>
    <form action="veiculos_save.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $veiculo['id']; ?>">
        
        <div class="form-group">
            <label>Modelo:</label>
            <input type="text" name="modelo" value="<?php echo $veiculo['modelo']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Marca:</label>
            <select name="id_marca" required>
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
            <label>Potência:</label>
            <input type="number" name="potencia" value="<?php echo $veiculo['potencia']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Ano:</label>
            <input type="number" name="ano" value="<?php echo $veiculo['ano']; ?>" required>
        </div>
        
        <div class="form-group">
            <label>Tipo:</label>
            <div class="radio-group">
                <label class="radio-option">
                    <input type="radio" name="tipo" value="Carro" <?php if($veiculo['tipo']=="Carro") echo "checked"; ?> required> 
                    Carro
                </label>
                <label class="radio-option">
                    <input type="radio" name="tipo" value="Moto" <?php if($veiculo['tipo']=="Moto") echo "checked"; ?>> 
                    Moto
                </label>
                <label class="radio-option">
                    <input type="radio" name="tipo" value="Caminhão" <?php if($veiculo['tipo']=="Caminhão") echo "checked"; ?>> 
                    Caminhão
                </label>
            </div>
        </div>
        
        <input type="submit" value="Salvar" class="btn">
    </form>
</div>