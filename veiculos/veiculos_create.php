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
    <title>Cadastro de Veículos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="page-title">Cadastro de Veículo</h2>
        <form action="veiculos_save.php" method="POST">
            <div class="form-group">
                <label class="form-label">Modelo:</label>
                <input type="text" name="modelo" class="form-input" required placeholder="Ex: Civic, Onix, HB20">
            </div>
            
            <div class="form-group">
                <label class="form-label">Marca:</label>
                <select name="id_marca" class="form-input form-select" required>
                    <option value="">Selecione a marca</option>
                    <?php 
                    $sql = "SELECT * FROM marcas";
                    $marcas = mysqli_query($con, $sql);
                    while ($m = mysqli_fetch_assoc($marcas)) {
                        echo "<option value='" . $m['id'] . "'>" . $m['marca'] . "</option>";
                    } 
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Potência (cv):</label>
                <input type="number" name="potencia" class="form-input" required min="1" placeholder="Ex: 120">
            </div>
            
            <div class="form-group">
                <label class="form-label">Ano:</label>
                <input type="number" name="ano" class="form-input" required min="1900" max="2025" placeholder="Ex: 2023">
            </div>
            
            <div class="form-group">
                <label class="form-label">Tipo:</label>
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="tipo" value="Carro" required> 
                        <i class="fas fa-car"></i> Carro
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="tipo" value="Moto"> 
                        <i class="fas fa-motorcycle"></i> Moto
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="tipo" value="Caminhão"> 
                        <i class="fas fa-truck"></i> Caminhão
                    </label>
                </div>
            </div>
            
            <input type="submit" value="Cadastrar" class="btn">
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const anoInput = document.querySelector('input[name="ano"]');
            anoInput.addEventListener('blur', function() {
                const currentYear = new Date().getFullYear();
                if (this.value < 1900 || this.value > currentYear + 1) {
                    this.setCustomValidity('Por favor, insira um ano válido entre 1900 e ' + (currentYear + 1));
                } else {
                    this.setCustomValidity('');
                }
            });
        });
    </script>
</body>
</html>