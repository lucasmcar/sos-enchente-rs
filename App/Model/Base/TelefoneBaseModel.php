<?php


namespace App\Model\Base;

abstract class TelefoneBaseModel
{
    protected $telefone;
    protected $tipo;
    protected $isTelegram;
    protected $isWpp;

    public abstract function setTelefone(string $telefone) : void;
    public abstract function getTelefone() : string;
    public abstract function setTipo(string $tipo) :void;
    public abstract function getTipo() : string;
    public abstract function isTelegram() : bool;
    public abstract function isWpp() : bool;
}