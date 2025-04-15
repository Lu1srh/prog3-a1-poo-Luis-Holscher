<?php
require_once('usuario.php');
require_once('sessao.php');

class Autenticador {
    public static function registrar(Usuario $usuario) {
        Sessao::iniciar();

        if (!isset($_SESSION['usuarios'])) {
            $_SESSION['usuarios'] = [];
        }

        $_SESSION['usuarios'][] = $usuario;
    }

    public static function autenticar($email, $senha) {
        Sessao::iniciar();

        if (!isset($_SESSION['usuarios'])) {
            return null;
        }

        foreach ($_SESSION['usuarios'] as $usuario) {
            if ($usuario->getEmail() === $email && $usuario->verificarSenha($senha)) {
                return $usuario;
            }
        }

        return null;
    }
}
?>
