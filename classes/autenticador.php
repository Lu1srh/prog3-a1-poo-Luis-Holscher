<?php
require_once 'Usuario.php';

class Autenticador {
    private static array $usuarios = [];

    public static function carregarUsuarios(): void {
        if (isset($_SESSION['Usuarios'])) {
            self::$usuarios = $_SESSION['Usuarios'];
        }
    }

    public static function salvarUsuarios(): void {
        $_SESSION['Usuarios'] = self::$usuarios;
    }

    public static function registrar(string $nome, string $email, string $senha): bool {
        self::carregarUsuarios();
        foreach(self::$usuarios as $user) {
            if ($user->getEmail() === $email) return false;
        }
        $novoUsuario = new Usuario($nome, $email, $senha);
        self::$usuarios[] = $novoUsuario;
        self::salvarUsuarios();
        return true;
    }

    public static function login(string $email, string $senha) {
        self::carregarUsuarios();
        foreach(self::$usuarios as $user) {
            if ($user->getEmail() === $email && $user->autenticar($senha)) {
                return $user;
            }
        }
        return false;
    }
}
?>
