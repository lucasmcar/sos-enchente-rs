<?php

namespace App\Controller;

use App\Core\View\View;
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

    public function inicio()
    {
        $repo = new ItensDoacaoRepository();
        $localDoacaoRepo = new LocalDoacaoRepository();
        $localAbrigo = new LocalAbrigoRepository();

        $arrayTypes = $repo->returnAllTypes();
        $arrayLocals = $localDoacaoRepo->returnAllLocal();
        $arrayLocalAbrigo = $localAbrigo->selectAll();
        
        /*$datas = [
            'title' => 'SOS Enchentes',
            'locais' => ['locais' => $arrayLocals],
            'selects' => ['selectTypes' => $arrayTypes,],
            'local' => ['local_abrigo' => $arrayLocalAbrigo ]
        ];


        return new View('index/inicio', $datas);*/


        @$this->view->dataSelectLocal = $arrayLocals;
        @$this->view->dataSelect = $arrayTypes;
        @$this->view->dataSelectAbrigo = $arrayLocalAbrigo;

        $this->render('inicio');
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
        $totalAbrigosPets = $localAbrigoRepo->totalAbrigoPets();
        $totalItensPorCidade = $localDoacaoRepo->itensPorCidade();
        $totalItensPorLocal = $localDoacaoRepo->itensPorLocal();

        $this->view->infoTotal = $totalItens;
        $this->view->infoTotalLocal = $totalLocais;
        $this->view->infoTotalAbrigos = $totalAbrigos;
        $this->view->infoTotalAbrigosPets = $totalAbrigosPets;
        $this->view->itensPorCidade = $totalItensPorCidade;
        $this->view->itensPorLocal = $totalItensPorLocal;

        $this->render('informacoes');
    }
}