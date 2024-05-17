<?php

namespace App\Model;

use App\Model\Base\LocalBaseModel;

class LocalDoacao extends LocalBaseModel
{
    public function setNome(string $nome) : void
    {
        $this->nome = $nome;
    }

    public function getNome() : string
    {
        return $this->nome;
    }

    public function setLogradouro(string $logradouro) : void
    {
        $this->logradouro = $logradouro;
    }

    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    public function setNumero(string $numero) : void
    {
        $this->numero = $numero;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setBairro(string $bairro) : void
    {
        $this->bairro = $bairro;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function setCidade(string $cidade) : void
    {
        $this->cidade = $cidade;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setUf(string $uf) : void
    {
        $this->uf = $uf;
    }

    public function getUf(): string
    {
        return $this->uf;
    }

    public function setTelefone(string $telefone) : void
    {
        $this->telefone = $telefone;
    }
    

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTipo(string $tipo) : void
    {
        $this->tipo = $tipo;
    }
    

    public function getTipo(): string
    {
        return $this->tipo;
    }

} 