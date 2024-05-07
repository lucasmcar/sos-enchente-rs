<?php

namespace App\Model;

class ItensDoacao
{
    private $idItensDoacao;
    private $nome;
    private $tipo;
    private $quantidade;
    private $dtCadastro;
   
    public function __construct()
    {
        
    }

    public function setIdItensDoacao(int $id) : void
    {
        $this->idItensDoacao = $id;
    }

    public function getIdItensDoacao() : int
    {
        return $this->idItensDoacao;
    }

    public function setNome(string $nome) : void
    {
        $this->nome = $nome;
    }

    public function getNome() : string
    {
        return $this->nome;
    }

    public function setTipo(string $tipo) : void
    {
        $this->tipo = $tipo;
    }

    public function getTipo() : string
    {
        return $this->tipo;
    }

    public function setQuantidade(int $quantidade) : void
    {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade() : int
    {
        return $this->quantidade;
    }

    public function setDtCadastro(string $dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;
    }

    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }
}