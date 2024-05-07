<?php

namespace App\Controller;

use App\Model\Cliente;
use App\Router\Controller\Action;
use App\Repository\ClienteRepository ;


class ClientController extends Action 
{
    public function index()
    {
        $this->render('register_client');
    }

    public function create()
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email');
        $nrIdentificacao = filter_input(INPUT_POST, 'nr_identificacao');
        $dtDesde = filter_input(INPUT_POST, 'dt_desde');

        $cliente = new Cliente();

        $cliente->setNome($nome);
        $cliente->setEmail($email);
        $cliente->setNrIdentificacao($nrIdentificacao);
        $cliente->setDtDeste($dtDesde);

        $clienteRepo = new ClienteRepository();
        $lastInserted = $clienteRepo->insert($cliente);

        if($lastInserted > 0){
            
            $this->view->success = true;
            $_SESSION['last_client_id'] = $lastInserted; 
            $this->render('register_client');
        }
    }

    public function info()
    {
        
    }
}