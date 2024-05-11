<?php

namespace App\Repository;

use App\Dao\LocalDoacaoDao;
use App\Model\LocalDoacao;

class LocalDoacaoRepository
{
    private $dao;

    public function __construct()
    {
        $this->dao = new LocalDoacaoDao();
    }

    public function insertLocal(LocalDoacao $local)
    {
        return $this->dao->insert($local);
    }

    public function returnAllLocal()
    {
        return $this->dao->returnAllLocal();
    }

    public function pegarLocalPorPagina(int $limit, int $offset)
    {
        return $this->dao->getLocalPorPagina($limit, $offset);
    }

    public function filtroPorLocal(string $local)
    {
        return $this->dao->filtroPorLocal($local);
    }

    public function totalLocal()
    {
        return $this->dao->getTotalLocal();
    }

    public function selectAll()
    {
        return $this->dao->returnAll();
    }
}