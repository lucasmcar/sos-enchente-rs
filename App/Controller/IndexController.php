<?php

namespace App\Controller;

use App\Model\ItensDoacao;
use App\Repository\ItensDoacaoRepository;
use App\Router\Controller\Action;

class IndexController extends Action
{
    public function verDoacoes()
    {
        $this->render('doacoes');
    }

    public function index()
    {

        $repo = new ItensDoacaoRepository();

        $arrayTypes = $repo->returnAllTypes();
        @$this->view->dataSelect = $arrayTypes;

        $this->render('index', 'index');
    }

    public function about()
    {
        $this->render('about');
    }
}