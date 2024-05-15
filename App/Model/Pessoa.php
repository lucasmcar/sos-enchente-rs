<?php

namespace App\Model;

class Pessoa
{
    private $idPessoa;
    private $nome;
    private $idade;
    private $infoAdicional;
    private $dtCadastro;
    private $idLocalAbrigo;

    public function __construct()
    {
        
    }

    public function setIdPessoa(int $idPessoa) : void
    {
        $this->idPessoa = $idPessoa;
    }

    public function getIdPessoa() : int
    {
        return $this->idPessoa;
    } 

    public function setNome(string $nome) : void
    {
        $this->nome = $nome;
    }

    public function getNome() : string
    {
        return $this->nome;
    } 

    public function setIdade(int $idade) : void
    {
        $this->idade = $idade;
    } 

    public function getIdade() : int
    {
        return $this->idade;
    }

    public function setInfoAdicional(string $infoAdicional) : void
    {
        $this->infoAdicional = $infoAdicional;
    }

    public function getInfoAdicional() : string
    {
        return $this->infoAdicional;
    }
    
    public function setDtCadastro(string $dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;
    }

    public function getDtCadastro() : string
    {
        return $this->dtCadastro;
    } 

    public function setIdLocalAbrigo(string $idLocalAbrigo) : void
    {
        $this->idLocalAbrigo = $idLocalAbrigo;
    }
    
    public function getIdLocalAbrigo() : int
    {
        return $this->idLocalAbrigo;
    } 


} 