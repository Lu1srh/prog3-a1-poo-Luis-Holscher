<?php
class Sessao {
    public static function iniciar() {
        if (session_status() == PHP_SESSION_NONE) {
            self::carregarClasses();
            session_start();
        }
    }

    private static function carregarClasses() {
        require_once 'usuario.php';
    }

    public static function set($chave, $valor) {
        self::iniciar()
        $_SESSION[$chave] = is_object($valor) || is_array($valor) ? serialize($valor) : $valor;
    }

    public static function get($chave) {
        self::iniciar();
        if (!isset($_SESSION[$chave])) {
            return null;
        }

        $data = $_SESSION[$chave];
        if (is_string($data) && ($unserialized = @unserialize($data)) !== false) {
            return $unserialized;
        }
        
        return $data;
    }

    public static function destruir() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
}
