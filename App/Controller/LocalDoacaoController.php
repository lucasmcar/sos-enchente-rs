<?php

namespace App\Controller;

use App\Helper\JsonHelper;
use App\Model\LocalDoacao;
use App\Repository\LocalDoacaoRepository;
use App\Router\Controller\Action;


class LocalDoacaoController extends Action
{
    public function create()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $novoLocal = new LocalDoacao();

        $novoLocal->setNome($data['nome']);
        $novoLocal->setLogradouro($data['logradouro']);
        $novoLocal->setNumero($data['numero']);
        $novoLocal->setBairro($data['bairro']);
        $novoLocal->setCidade($data['cidade']);
        $novoLocal->setUf($data['uf']);
        $novoLocal->setTelefone($data['telefone']);

        $localDoacaoRepo = new LocalDoacaoRepository();

        $localDoacaoRepo->insertLocal($novoLocal);

        header('location: /ver-locais');
    }

    public function verLocais()
    {
        $viewLocais = new LocalDoacaoRepository();

        $total_registros = 10;

        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $deslocamento = ($pagina-1) * $total_registros;

        $locais = $viewLocais->pegarLocalPorPagina($total_registros, $deslocamento);
        $totalLocais = $viewLocais->totalLocal();
        $this->view->totalPaginas = ceil($totalLocais/$total_registros);
        $this->view->paginaAtiva = $pagina;
        
        //$array = $viewItens->getAll();
        $this->view->locais = $locais;

        $this->render('locais');
    }

    public function filtroLocal()
    {
        $filtroLocais = new LocalDoacaoRepository();

        $filtro = filter_input(INPUT_POST, 'filtro_local');

        $dados = $filtroLocais->filtroPorLocal($filtro);
        
        echo JsonHelper::toJson($dados);
    }
    
}