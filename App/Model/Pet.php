<?php

namespace App\Model;

class Pet
{
    private $idPet;
    private $nome;
    private $raca;
    private $especie;
    private $idade;
    private $infoAdicional;
    private $imagemPath;
    private $idLocalAbrigo;
    private $dtCadastro;

    public function __construct()
    {
        
    }

    public function setIdPet(int $idPet) : void
    {
        $this->idPet = $idPet;
    }

    public function getIdPet() : int
    {
        return $this->idPet;
    } 

    public function setNome(string $nome) : void
    {
        $this->nome = $nome;
    }

    public function getNome() : string
    {
        return $this->nome;
    } 

    public function setRaca(string $raca) : void
    {
        $this->raca = $raca;
    }

    public function getRaca() : string
    {
        return $this->raca;
    }

    public function setEspecie(string $especie) : void
    {
        $this->especie = $especie;
    } 

    public function getEspecie() : string 
    {
        return $this->especie;
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

    public function setImagemPath($path) : void
    {
        $this->imagemPath = $path;
    }

    public function getImagemPath() : string
    {
        return $this->imagemPath;
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