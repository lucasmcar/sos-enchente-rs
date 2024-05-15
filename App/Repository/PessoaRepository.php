<?php

namespace App\Repository;

use App\Model\Pessoa;
use App\Dao\PessoaDao;

class PessoaRepository
{
    private $dao;

    public function __construct()
    {
        $this->dao = new PessoaDao();
    }

    public function insert(Pessoa $pessoa)
    {
        return $this->dao->insert($pessoa);
    }

    public function returnAll(string $orderBy = 'ASC')
    {
        return $this->dao->returnAll($orderBy);
    }

    public function getPessoaPorPagina(int $limite, int $offset)
    {
        return $this->dao->getPessoaPorPagina($limite, $offset);
    }

    public function getTotalPessoas()
    {
        return $this->dao->getTotalPessoas();
    }
}
