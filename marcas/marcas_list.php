<?php
include("../includes/navbar.php");
include("../includes/conexao.php");
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <h2>Marcas Cadastradas</h2>
    <a href="marcas_create.php" class="btn">Nova Marca</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM marcas";
            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['marca']."</td>";
                echo "<td>
                        <a href='marcas_edit.php?id=".$row['id']."' class='btn'>Editar</a>
                        <a href='marcas_delete.php?id=".$row['id']."' class='btn'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
