<?php 
include("../includes/auth.php");
include("../includes/navbar.php");
include("../includes/conexao.php"); 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Marca</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="page-title">Cadastro de Marca</h2>
        
        <?php
        if (isset($_GET['success']) && $_GET['success'] == '1') {
            echo '<div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> Marca cadastrada com sucesso!
                  </div>';
        }
        
        if (isset($_GET['error'])) {
            $error_msg = '';
            switch($_GET['error']) {
                case '1': $error_msg = 'Erro ao cadastrar marca'; break;
                case '2': $error_msg = 'Marca já existe'; break;
                case '3': $error_msg = 'Preencha o campo marca'; break;
                default: $error_msg = 'Erro desconhecido';
            }
            echo '<div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> ' . $error_msg . '
                  </div>';
        }
        ?>
        
        <form action="marcas_save.php" method="POST">
            <div class="form-group">
                <label class="form-label" for="marca">Nome da Marca:</label>
                <input type="text" id="marca" name="marca" class="form-input" required 
                       placeholder="Ex: Volkswagen, Ford, Toyota">
            </div>
            
            <button type="submit" class="btn">
                <i class="fas fa-save"></i> Cadastrar Marca
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const messages = document.querySelectorAll('.alert');
                messages.forEach(function(msg) {
                    msg.style.opacity = '0';
                    msg.style.transition = 'opacity 0.5s ease';
                    setTimeout(function() {
                        msg.remove();
                    }, 500);
                });
            }, 5000);
            
            document.getElementById('marca').focus();
        });
    </script>
</body>
</html>