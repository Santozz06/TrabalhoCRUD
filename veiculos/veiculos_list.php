<?php
include("../includes/auth.php");
include("../includes/navbar.php");
include("../includes/conexao.php");
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <div class="page-header">
        <h2 class="page-title">Veículos Cadastrados</h2>
        <a href="veiculos_create.php" class="btn-new">
            <i class="fas fa-plus"></i> Novo Veículo
        </a>
    </div>
    
    <div class="table-container">
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
                        JOIN marcas m ON v.id_marca = m.id 
                        ORDER BY v.id DESC";
                $result = mysqli_query($con, $sql);

                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['modelo']."</td>";
                    echo "<td>".$row['marca']."</td>";
                    echo "<td>".$row['potencia']." cv</td>";
                    echo "<td>".$row['ano']."</td>";
                    echo "<td>".$row['tipo']."</td>";
                    echo "<td>
                            <div class='action-buttons'>
                                <a href='veiculos_edit.php?id=".$row['id']."' class='btn-action btn-edit'>
                                    <i class='fas fa-edit'></i> Editar
                                </a>
                                <a href='veiculos_delete.php?id=".$row['id']."' class='btn-action btn-delete' 
                                   onclick='return confirm(\"Tem certeza que deseja excluir este veículo?\")'>
                                    <i class='fas fa-trash'></i> Excluir
                                </a>
                            </div>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>