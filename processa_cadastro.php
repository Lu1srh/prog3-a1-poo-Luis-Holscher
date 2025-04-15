<?php
require_once 'classes/usuario.php';
require_once 'classes/autenticador.php';
require_once 'classes/sessao.php';


Sessao::iniciar();

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'] ?? '';

if (empty($nome) || empty($email) || empty($senha)) {
    header('Location: Cadastro.php?erro=Preencha todos os campos corretamente.');
    exit;
}

if (Autenticador::registrar($nome, $email, $senha)) {
    header('Location: Login.php');
} else {
    header('Location: Cadastro.php?erro=E-mail já cadastrado.');
}
exit;
?>
