<?php
include("../includes/navbar.php");
include("../includes/conexao.php");
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <h2>Veículos Cadastrados</h2>
    <a href="veiculos_create.php" class="btn">Novo Veículo</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Potência</th>
                <th>Ano</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT v.id, v.modelo, m.marca, v.potencia, v.ano, v.tipo 
                    FROM veiculos v 
                    JOIN marcas m ON v.id_marca = m.id";
            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['modelo']."</td>";
                echo "<td>".$row['marca']."</td>";
                echo "<td>".$row['potencia']."</td>";
                echo "<td>".$row['ano']."</td>";
                echo "<td>".$row['tipo']."</td>";
                echo "<td>
                        <a href='veiculos_edit.php?id=".$row['id']."' class='btn'>Editar</a>
                        <a href='veiculos_delete.php?id=".$row['id']."' class='btn'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
