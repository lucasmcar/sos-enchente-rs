<?php


namespace App\Model\Base;

abstract class BaseModel
{
    protected $nome;
    protected $email;
    protected $nrIdentificacao;
    
    public abstract function setNome(string $nome) : void;
    public abstract function getNome() : string;
    public abstract function setEmail(string $email): void;
    public abstract function getEmail() : string;
    public abstract function setNrIdentificacao(string $nrIdentificacao) : void;
    public abstract function getNrIdentificacao() : string;

}