<?php

namespace App\Controller;

use App\Router\Controller\Action;

class IndexController extends Action
{
    public function verDoacoes()
    {
        $this->render('doacoes');
    }

    public function index()
    {
        $this->render('index', 'index');
    }
}