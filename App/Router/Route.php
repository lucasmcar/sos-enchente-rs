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

            'infos' => [
                'route' => '/info',
                'controller' => 'indexController',
                'action' => 'info'
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

            

            'doacaoPix' => [
                'route' => '/ajude',
                'controller' => 'indexController',
                'action' => 'doar'
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
            

            //Rotas para gerar PDF E EXCEL
            'convertToExcel' => [
                'route' => '/local/export-excel',
                'controller' => 'localDoacaoController',
                'action' => 'convertToExcel'
            ],

            'convertToPdf' => [
                'route' => '/local/export-pdf',
                'controller' => 'localDoacaoController',
                'action' => 'convertToPdf'
            ],

            'convertToExcelDoacao' => [
                'route' => '/doacao/export-excel',
                'controller' => 'itensDoacaoController',
                'action' => 'convertToExcel'
            ],

            'convertToPdfDoacao' => [
                'route' => '/doacao/export-pdf',
                'controller' => 'itensDoacaoController',
                'action' => 'convertToPdf'
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