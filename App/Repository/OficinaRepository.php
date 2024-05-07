<?php

namespace App\Repository;

use App\Dao\OficinaDao;
use App\Model\Oficina;

class OficinaRepository
{
    private $dao;

    public function __construct()
    {
        $this->dao = new OficinaDao();
    }

    public function autenticar(Oficina $model)
    {
        return $this->dao->oficinaAuth($model);
    }
}