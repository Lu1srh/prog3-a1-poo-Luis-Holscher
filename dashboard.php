<?php
require_once 'classes/usuario.php';
require_once 'classes/sessao.php';

Sessao::iniciar();

$currentUser = Sessao::get('usuario');

if (!$currentUser) {
    header("Location: login.php");
    exit;
}

$savedEmailCookie = $_COOKIE['email_salvo'] ?? 'Não salvo';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Área Restrita</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?= htmlspecialchars($currentUser->getNome()); ?>!</h2>
        <div class="dashboard-info">
            <p><strong>Seu e-mail:</strong> <?= htmlspecialchars($currentUser->getEmail()); ?></p>
            <p><strong>E-mail salvo no cookie:</strong> <?= htmlspecialchars($savedEmailCookie); ?></p>
        </div>
        <a href="logout.php" class="btn">Sair</a>
    </div>
</body>
</html>