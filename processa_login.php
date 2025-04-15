<?php
require_once 'classes/sessao.php';
require_once 'classes/autenticador.php';

Sessao::iniciar();

$loginEmail = filter_var(trim($_POST['loginEmail']), FILTER_VALIDATE_EMAIL);
$loginPassword = $_POST['loginPassword'];
$rememberEmail = isset($_POST['rememberEmail']);

$authenticatedUser = Autenticador::autenticar($loginEmail, $loginPassword);

if ($authenticatedUser) {
    Sessao::set('usuario', $authenticatedUser);

    if ($rememberEmail) {
        setcookie("email_salvo", $loginEmail, time() + (86400 * 30), "/");
    } else {
        setcookie("email_salvo", "", time() - 3600, "/");
    }

    header("Location: dashboard.php");
    exit;
} else {
    echo '<div class="container alert alert-error">
            Login inválido. <a href="login.php">Tentar novamente</a>
          </div>';
}
?>