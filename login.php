<?php
$savedEmailCookie = $_COOKIE['email_salvo'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="processa_login.php" method="POST">
            <label>Email:</label>
            <input type="email" name="loginEmail" value="<?= htmlspecialchars($savedEmailCookie) ?>" required>
            
            <label>Senha:</label>
            <input type="password" name="loginPassword" required>
            
            <div class="remember-me">
                <input type="checkbox" name="rememberEmail" <?= $savedEmailCookie ? 'checked' : '' ?>>
                <span>Lembrar e-mail</span>
            </div>
            
            <button type="submit">Entrar</button>
        </form>
        <p class="text-center">Não tem conta? <a href="cadastro.php">Crie uma</a></p>
    </div>
</body>
</html>