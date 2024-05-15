<?php

namespace App\Model;

class Usuario
{
    private $nome;
    private $email;
    private $senha;
    private $usuario;
    private $dtCadastro;
    private $idTipoUsuario;

    public function __construct()
    {
        
    }

    public function setNome(string $nome) : void
    {
        $this->nome = $nome;
    }

    public function getNome() : string 
    {
        return $this->nome;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function getEmail() : string 
    {
        return $this->email;
    }

    public function setSenha(string $senha) : void
    {
        $this->senha = $senha;
    }

    public function getSenha() : string 
    {
        return $this->senha;
    }

    public function setUsuario(string $usuario) : void
    {
        $this->usuario = $usuario;
    }

    public function getUsuario() : string
    {
        return $this->usuario;
    }
    public function setIdTipoUsuario(int $idTipoUsuario) : void
    {
        $this->idTipoUsuario = $idTipoUsuario;
    }

    public function getIdTipoUsuario() : int 
    {
        return $this->idTipoUsuario;
    }
}