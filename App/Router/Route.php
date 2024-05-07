<?php

namespace App\Router;

use App\Router\Init\Bootstrap;


class Route extends Bootstrap
{
    protected function initRoutes()
    {

        $routes = [
            //Basicas, rotas do site

            'home' => [
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            ],

            'registroDoacoes' => [
                'route' => '/ver-doacoes',
                'controller' => 'itensDoacaoController',
                'action' => 'verDoacoes'
            ],


            //Rotas de cadastro das modais
            'cadastroDoacoes' => [
                'route' =>  '/nova/doacao',
                'controller' => 'itensDoacaoController',
                'action' => 'create'
            ],



            'about' => [
                'route' => '/about',
                'controller' => 'indexController',
                'action' => 'about'
            ],

            'contact' => [
                'route' => '/contact',
                'controller' => 'indexController',
                'action' => 'contact'
            ],

            
            
        ];

        /*$routes['home'] = [
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        ];

        $routes['about'] = [
            'route' => '/about',
            'controller' => 'indexController',
            'action' => 'about'
        ];*/

        $this->setRoutes($routes);
    }
}