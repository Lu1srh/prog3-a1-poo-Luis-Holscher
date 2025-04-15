<?php
class Usuario {
    private string $nome;
    private string $email;
    private string $senhaHash;

    public function __construct(string $nome, string $email, string $senhaPlano) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senhaHash = password_hash($senhaPlano, PASSWORD_DEFAULT);
    }

    public function autenticar(string $senhaEntrada): bool {
        return password_verify($senhaEntrada, $this->senhaHash);
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEmail(): string {
        return $this->email;
    }
}
?>
