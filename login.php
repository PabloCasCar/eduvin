<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('cabecalho.php');?>

    <div class="login-container">
        <h2>Login da Conta</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="text" placeholder="Digite seu usuário" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" placeholder="Digite sua senha" name="password" required>
            </div>
            <div class="input-group remember-me">
                <input type="checkbox" name="remember">
                <label for="remember">Lembrar-me</label>
            </div>
            <button type="submit">Conecte-se</button>
        </form>
        <div class="footer-links">
            <a href="registo.php">Não tem uma conta?</a>
            <?php include_once('registo.php');?>
            <a href="#">Esqueceu a senha?</a>
        </div>
    </div>
    <?php include_once('footer.php');?>
</body>
</html>

