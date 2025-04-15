<?php
class Sessao {
    public static function iniciar() {
        if (session_status() == PHP_SESSION_NONE) {
            // Carrega as classes necessárias antes de iniciar a sessão
            self::carregarClasses();
            session_start();
        }
    }

    private static function carregarClasses() {
        require_once 'usuario.php';
        // Adicione outras classes que podem ser armazenadas na sessão
    }

    public static function set($chave, $valor) {
        self::iniciar();
        // Serializa apenas se for um objeto ou array
        $_SESSION[$chave] = is_object($valor) || is_array($valor) ? serialize($valor) : $valor;
    }

    public static function get($chave) {
        self::iniciar();
        if (!isset($_SESSION[$chave])) {
            return null;
        }
        
        // Verifica se o valor é uma string serializada
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
