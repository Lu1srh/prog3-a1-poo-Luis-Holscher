<?php
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = htmlspecialchars(trim($_POST['userName']));
    $userEmail = filter_var(trim($_POST['userEmail']), FILTER_VALIDATE_EMAIL);
    $userPassword = $_POST['userPassword'];

    if ($userName && $userEmail && $userPassword) {
        $newUser  = new Usuario($userName, $userEmail, $userPassword);
        Autenticador::registrar($newUser );
        header("Location: login.php");
        exit;
    } else {
        echo "Dados inválidos. <a href='cadastro.php'>Voltar</a>";
    }
}
?>