<?php
class Usuario {
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha, $jaComHash = false) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $jaComHash ? $senha : password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function verificarSenha($senhaInformada) {
        return password_verify($senhaInformada, $this->senha);
    }
}
?>
