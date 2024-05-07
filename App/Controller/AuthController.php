<?php

namespace App\Controller;

use App\Model\Oficina;
use App\Model\Cliente;
use App\Repository\ClienteRepository;
use App\Repository\OficinaRepository;
use App\Router\Controller\Action;

class AuthController extends Action
{
    public function autenticar()
    {
        $tipo = filter_input(INPUT_POST, 'tipo');

        switch($tipo){
            case "1":

                $clienteObj = new Cliente();

                $nrIdentificacaoCliente = filter_input(INPUT_POST, 'nridentificacao');
                $emailCliente = filter_input(INPUT_POST, 'email');

                $clienteObj->setEmail($emailCliente);
                $clienteObj->setNrIdentificacao($nrIdentificacaoCliente);

                if($clienteObj->getEmail() != "" && $clienteObj->getNrIdentificacao() != ""){
                    $clientRepo = new ClienteRepository();
                    $client = $clientRepo->autenticar($clienteObj);

                    if($client != null){
                        session_start();

                        $_SESSION['id'] = $client['idcliente'];
                        $_SESSION['nome_cliente'] = $client['nome'];
                        $_SESSION['email_cliente'] = $client['email'];
                        $_SESSION['identificacao'] = $client['nridentificacao'];

                        header("location: /client/dashboard");
                        exit;
                    } else {
                        header("location: /?login=erro&tipo=1");
                        exit;
                    }
                } 

                header("location: /?login=erro&tipo=1");
                exit;
                break;
            default:
                
                $oficinaObj = new Oficina();

                $nIdentificacaoOficina = filter_input(INPUT_POST, 'nridentificacao');
                $emailOficina = filter_input(INPUT_POST, 'nridentificacao');
                
                $oficinaObj->setEmail($emailOficina);
                $oficinaObj->setNrIdentificacao($nIdentificacaoOficina);

                if($oficinaObj->getEmail() && $oficinaObj->getNrIdentificacao()){
                    $oficinaRepo = new OficinaRepository();
                    $oficina = $oficinaRepo->autenticar($oficinaObj);

                    
                    if($oficina != null){
                        session_start();

                        $_SESSION['id_oficina'] = $oficina['idoficina'];
                        $_SESSION['nome_oficina'] = $oficina['nome'];
                        $_SESSION['email_oficina'] = $oficina['email'];
                        $_SESSION['identificacao'] = $oficina['nridentificacao'];

                        header("location: /oficina/oficina_dashboard");
                        exit;
                    }

                    
                    exit;
                } else {
                    header("location: /?login=erro&tipo=0");
                }
                break;
        }
    }

    public function logout()
    {
        session_start();

        session_destroy();

        header('location: /');

    }
}