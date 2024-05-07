<?php

namespace App\Repository;

use App\Core\Mail\Mailer;
use App\Model\Servico;
use ServicoDao;

class ServicoRepository
{

    private $dao;

    public function __construct()
    {
        $this->dao = new ServicoDao();
    }

    public function registra(Servico $model, int $veiculoId)
    {
        if($this->dao->insert($model, $veiculoId)){
            $mailer = new Mailer();
            $mailer->send("to", "assunto", "corpo"); 
        }
    }
}