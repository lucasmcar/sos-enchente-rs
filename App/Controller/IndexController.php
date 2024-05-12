<?php

namespace App\Controller;

use App\Model\ItensDoacao;
use App\Repository\ItensDoacaoRepository;
use App\Repository\LocalDoacaoRepository;
use App\Repository\LocalAbrigoRepository;
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

        $repo = new ItensDoacaoRepository();
        $localDoacaoRepo = new LocalDoacaoRepository();
        $localAbrigoRepo = new LocalAbrigoRepository();

        $totalItens = $repo->totalItens();
        $totalLocais = $localDoacaoRepo->totalLocal();
        $totalAbrigos = $localAbrigoRepo->totalAbrigo();
        $totalItensPorCidade = $localDoacaoRepo->itensPorCidade();

        $this->view->infoTotal = $totalItens;
        $this->view->infoTotalLocal = $totalLocais;
        $this->view->infoTotalAbrigos = $totalAbrigos;
        $this->view->itensPorCidade = $totalItensPorCidade;

        $this->render('informacoes');
    }
}