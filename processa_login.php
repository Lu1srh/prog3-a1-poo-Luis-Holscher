<?php
require_once 'classes/usuario.php';
require_once 'classes/autenticador.php';
require_once 'classes/sessao.php';

Sessao::iniciar();
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'] ?? '';
$lembrar = isset($_POST['lembrar']);

$usuarioLogado = Autenticador::login($email, $senha);

if (!$usuarioLogado) {
    header('Location: Login.php?erro=E-mail ou senha inválidos.');
    exit;
}

Sessao::set('usuario_nome', $usuarioLogado->getNome());
Sessao::set('usuario_email', $usuarioLogado->getEmail());
Sessao::set('logged_in', true);

if ($lembrar) {
    setcookie('email', $email, time() + (86400 * 30), "/");
}

header('Location: Dashboard.php'); 
exit;
?>
