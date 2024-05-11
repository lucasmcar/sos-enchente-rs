<?php

namespace App\Controller;

use App\Model\ItensDoacao;
use App\Repository\ItensDoacaoRepository;
use App\Repository\LocalDoacaoRepository;
use App\Router\Controller\Action;

class IndexController extends Action
{
    public function verDoacoes()
    {
        $this->render('doacoes');
    }

    public function verLocais()
    {
        $this->render('locais');
    }

    public function index()
    {

        $repo = new ItensDoacaoRepository();
        $localDoacaoRepo = new LocalDoacaoRepository();

        $arrayTypes = $repo->returnAllTypes();
        $arrayLocals = $localDoacaoRepo->returnAllLocal();
        


        @$this->view->dataSelectLocal = $arrayLocals;
        @$this->view->dataSelect = $arrayTypes;

        $this->render('index', 'index');
    }

    public function about()
    {
        $this->render('about');
    }

    public function doar()
    {
        $this->render('ajude');
    }

    public function info()
    {
        $this->render('informacoes');
    }
}