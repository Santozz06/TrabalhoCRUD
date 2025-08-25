<?php
include("../includes/navbar.php");
include("../includes/conexao.php");
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <h2>Cadastro de Veículo</h2>
    <form action="veiculos_save.php" method="POST">
        <div class="form-group">
            <label>Modelo:</label>
            <input type="text" name="modelo" required>
        </div>
        
        <div class="form-group">
            <label>Marca:</label>
            <select name="id_marca" required>
                <option value="">Selecione a marca</option>
                <?php
                $sql = "SELECT * FROM marcas";
                $marcas = mysqli_query($con, $sql);
                while($m = mysqli_fetch_assoc($marcas)){
                    echo "<option value='".$m['id']."'>".$m['marca']."</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Potência:</label>
            <input type="number" name="potencia" required>
        </div>
        
        <div class="form-group">
            <label>Ano:</label>
            <input type="number" name="ano" required>
        </div>
        
        <div class="form-group">
            <label>Tipo:</label>
            <div class="radio-group">
                <label class="radio-option">
                    <input type="radio" name="tipo" value="Carro" required> Carro
                </label>
                <label class="radio-option">
                    <input type="radio" name="tipo" value="Moto"> Moto
                </label>
                <label class="radio-option">
                    <input type="radio" name="tipo" value="Caminhão"> Caminhão
                </label>
            </div>
        </div>
        
        <input type="submit" value="Cadastrar" class="btn">
    </form>
</div>