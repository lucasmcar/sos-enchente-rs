<?php

namespace App\Repository;

use App\Dao\LocalAbrigoDao;
use App\Model\LocalAbrigo;

class LocalAbrigoRepository
{
    private $dao;

    public function __construct()
    {
        $this->dao = new LocalAbrigoDao();
    }

    public function insertAbrigo(LocalAbrigo $abrigo)
    {
        return $this->dao->insert($abrigo);
    }

    public function returnAllAbrigo()
    {
        return $this->dao->returnAllAbrigo();
    }

    public function returnAllAbrigoPet()
    {
        return $this->dao->returnAllAbrigoPet();
    }

    public function pegarAbrigoPorPagina(int $limit, int $offset)
    {
        return $this->dao->getAbrigoPorPagina($limit, $offset);
    }

    public function pegarAbrigoPetsPorPagina(int $limit, int $offset)
    {
        return $this->dao->getAbrigoPetsPorPagina($limit, $offset);
    }

    public function filtroPorAbrigo(string $abrigo)
    {
        return $this->dao->filtroPorAbrigo($abrigo);
    }

    public function filtroPetPorAbrigo(string $abrigo)
    {
        return $this->dao->filtroPetPorAbrigo($abrigo);
    }

    public function totalAbrigo()
    {
        return $this->dao->getTotalAbrigos();
    }

    public function totalAbrigoPets()
    {
        return $this->dao->getTotalAbrigoPets();
    }

    public function selectAll()
    {
        return $this->dao->returnAll();
    }
}