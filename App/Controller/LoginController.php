<?php

namespace App\Controller;

use App\Helper\JsonHelper;
use App\Router\Controller\Action;

class LoginController extends Action
{
    public function login()
    {
        $this->render('login');
    }

    public function autenticacao()
    {

        $data = json_decode(file_get_contents("php://input"), true);

        $data['inputs']['usuario'];
        $data['inputs']['senha'];
        $data['inputs']['slcUser'];

       echo JsonHelper::toJson(["redirect_url" => "/inicio"]);
        
    }

    public function logout()
    {
        if(isset($_SESSION)){
            session_destroy();
            
        }
        header("location: /login");
    }

    public function novoCadastro()
    {
        $this->render('cadastro');
    }
}