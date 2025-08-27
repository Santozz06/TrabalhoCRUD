<link rel="stylesheet" href="../css/style.css">

<div class="login-wrapper">
    <div class="container">
        <h2 class="page-title">Login</h2>
        <!-- Mensagem de erro -->
        <?php if(isset($_GET['status']) && $_GET['status'] == 'erro'): ?>
            <div class="feedback-message" style="display:block; background: #f8d7da; color:#842029; border:1px solid #f5c2c7;">
                Usuário ou senha inválidos!
            </div>
        <?php endif; ?>

        <form action="autenticar.php" method="POST">
            <div class="form-group">
                <label for="usuario" class="form-label">Email</label>
                <input type="email" name="usuario" id="usuario" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-input" required>
            </div>
            <button type="submit" name="login" class="btn">Entrar</button>
        </form>
    </div>
</div>
