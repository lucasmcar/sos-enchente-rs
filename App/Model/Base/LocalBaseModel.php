<?php


namespace App\Model\Base;

abstract class LocalBaseModel
{
    protected $nome;
    protected $logradouro;
    protected $numero;
    protected $bairro;
    protected $cidade;
    protected $uf;
    protected $telefone;


    public abstract function setNome(string $nome) : void;
    public abstract function getNome() : string;
    public abstract function setLogradouro(string $logradouro) :void;
    public abstract function getLogradouro() : string;
    public abstract function setNumero(string $numero) : void;
    public abstract function getNumero() : string;
    public abstract function setBairro(string $bairro) : void;
    public abstract function getBairro() : string;
    public abstract function setCidade(string $bairro) : void;
    public abstract function getCidade() : string;
    public abstract function setUf(string $uf) : void;
    public abstract function getUf() : string;
    public abstract function setTelefone(string $telefone) : void;
    public abstract function getTelefone() : string;
}