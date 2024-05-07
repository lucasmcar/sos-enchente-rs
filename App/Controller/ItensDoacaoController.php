<?php

namespace App\Controller;

use App\Model\ItensDoacao;
use App\Repository\ItensDoacaoRepository;
use App\Router\Controller\Action;

class ItensDoacaoController extends Action
{
    public function create()
    {

        $data = json_decode(file_get_contents("php://input"), true);

        $novoItem = new ItensDoacao();

        $novoItem->setNome($data['nome']);
        $novoItem->setTipo($data['select']);
        $novoItem->setQuantidade(intval($data['quantidade']));

        $registroItens = new ItensDoacaoRepository();

        if($registroItens->create($novoItem)){
            echo "<script>alert('Item cadastrado com suceso')</script>";
            header('location: /ver-doacoes');
            exit;
        }
    }

    public function verDoacoes()
    {

        $viewItens = new ItensDoacaoRepository();

        $total_registros = 10;

        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $deslocamento = ($pagina-1) * $total_registros;

        $itens = $viewItens->pegarItensPorPagina($total_registros, $deslocamento);
        $totalItens = $viewItens->totalItens();
        $this->view->totalPaginas = ceil($totalItens/$total_registros);
        $this->view->paginaAtiva = $pagina;
        
        //$array = $viewItens->getAll();
        $this->view->itens = $itens;

        $this->render('itens');
    }
}