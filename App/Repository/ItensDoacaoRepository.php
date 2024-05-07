<?php

namespace App\Repository;

use App\Dao\ItensDoacaoDao;
use App\Model\ItensDoacao;

class ItensDoacaoRepository
{
    private $dao;

    public function __construct()
    {
        $this->dao = new ItensDoacaoDao();
    }

    public function create(ItensDoacao $itens) : bool
    {
        return $this->dao->insert($itens);
    }

    public function getAll()
    {
        return $this->dao->selectAll();
    }


    
    

    public function totalItens()
    {
        return $this->dao->getTotalItens();
    }
}