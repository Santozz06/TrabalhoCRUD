<?php
include("../includes/navbar.php");
include("../includes/conexao.php");
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <h2>Cadastro de Veículo</h2>
    <form action="veiculos_save.php" method="POST">
        Modelo: <input type="text" name="modelo" required>
        Marca:
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
        Potência: <input type="number" name="potencia" required>
        Ano: <input type="number" name="ano" required>
        Tipo:
        <label><input type="radio" name="tipo" value="Carro" required> Carro</label>
        <label><input type="radio" name="tipo" value="Moto"> Moto</label>
        <label><input type="radio" name="tipo" value="Caminhão"> Caminhão</label>
        <input type="submit" value="Cadastrar" class="btn">
    </form>
</div>
