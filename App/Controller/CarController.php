<?php

namespace App\Controller;

use App\Model\Carro;
use App\Repository\CarroRepository;
use App\Router\Controller\Action;

class CarController extends Action
{
    public function index()
    {
        
        $this->render('register_car');
    }

    public function create()
    {

        $modelo = filter_input(INPUT_POST, 'modelo');
        $placa = filter_input(INPUT_POST, 'placa');
        $cor = filter_input(INPUT_POST, 'cor');
        $ano = filter_input(INPUT_POST, 'ano');
        $marca = filter_input(INPUT_POST, 'marca');

        $carro = new Carro();

        $carro->setModelo($modelo);
        $carro->setPlaca($placa);
        $carro->setCor($cor);
        $carro->setAno($ano);
        $carro->setMarca($marca);
        $carro->setClienteId($_SESSION['last_client_id']);

        $carroRepo = new CarroRepository();
        if($carroRepo->create($carro)){
            $this->view->carSuccess = true;
            $this->render('register_car');
        }
    }

    public function find()
    {
        $carroRepo = new CarroRepository();
        $allCars = $carroRepo->getAllInfo();
        $this->view->carDataInfo = $allCars;
        $this->render('view');
    }
}