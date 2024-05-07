<?php

namespace App\Repository;

use App\Dao\ClienteDao;
use App\Model\Cliente;

class ClienteRepository
{
    private $dao;

    public function __construct()
    {
        $this->dao = new ClienteDao();
    }

    public function insert(Cliente $model) : int
    {
        return $this->dao->insert($model);
    }

    public function autenticar(Cliente $model) : array | null
    {
        return $this->dao->clientAuth($model);
    }

    public function infoClient(int $idCliente)
    {
        return $this->dao->selectClientInfo($idCliente);
    }
}