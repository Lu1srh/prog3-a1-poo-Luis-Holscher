<?php
$email_cookie = $_COOKIE['email'] ?? '';
$erro = $_GET['erro'] ?? '';
$sucesso = $_GET['sucesso'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="POST" action="processa_login.php">
        <input type="email" name="email" value="<?= htmlspecialchars($email_cookie) ?>" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <label><input type="checkbox" name="lembrar"> Lembrar e-mail</label>
        <button type="submit">Login</button>
    </form>
    <a href="cadastro.php">Criar conta</a>
</div>
</body>
</html>
