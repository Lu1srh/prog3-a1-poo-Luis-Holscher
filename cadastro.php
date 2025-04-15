<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<link rel="stylesheet" href="assets/style.css">
<body>
    <h2>Cadastro</h2>
    <form action="processa_cadastro.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="userName" required><br>
        <label>Email:</label><br>
        <input type="email" name="userEmail" required><br>
        <label>Senha:</label><br>
        <input type="password" name="userPassword" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="login.php">Já tem conta? Login</a>
</body>
</html>