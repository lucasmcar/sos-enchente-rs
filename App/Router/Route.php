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

            'about' => [
                'route' => '/about',
                'controller' => 'indexController',
                'action' => 'about'
            ],

            'registroDoacoes' => [
                'route' => '/ver-doacoes',
                'controller' => 'itensDoacaoController',
                'action' => 'verDoacoes'
            ],

            'filtro' => [
                'route' => '/doacoes/filtro',
                'controller' => 'itensDoacaoController',
                'action' => 'filtroDoacoes'
            ],

            'filtroLocal' => [
                'route' => '/local/filtro',
                'controller' => 'localDoacaoController',
                'action' => 'filtroLocal'
            ],

            //Rotas de cadastro das modais
            'cadastroDoacoes' => [
                'route' =>  '/nova/doacao',
                'controller' => 'itensDoacaoController',
                'action' => 'create'
            ],

            'cadastroLocalDoacao' => [
                'route' => '/novo/local-doacao',
                'controller' => 'localDoacaoController',
                'action' => 'create'
            ],

            'verLocalDoacao' => [
                'route' => '/ver-locais',
                'controller' => 'localDoacaoController',
                'action' => 'verLocais'
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