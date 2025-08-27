<?php
include("../includes/auth.php");
include("../includes/navbar.php");
include("../includes/conexao.php");
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <div class="page-header">
        <h2 class="page-title">Marcas Cadastradas</h2>
        <a href="marcas_create.php" class="btn-new">
            <i class="fas fa-plus"></i> Nova Marca
        </a>
    </div>
    
    <div class="table-container">
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
                $sql = "SELECT * FROM marcas ORDER BY id DESC";
                $result = mysqli_query($con, $sql);

                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['marca']."</td>";
                    echo "<td>
                            <div class='action-buttons'>
                                <a href='marcas_edit.php?id=".$row['id']."' class='btn-action btn-edit'>
                                    <i class='fas fa-edit'></i> Editar
                                </a>
                                <a href='marcas_delete.php?id=".$row['id']."' class='btn-action btn-delete' 
                                   onclick='return confirm(\"Tem certeza que deseja excluir esta marca?\")'>
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