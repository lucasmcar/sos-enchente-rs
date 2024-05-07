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
                'controller' => 'indexController',
                'action' => 'verDoacoes'
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

            /**
             * Rota para recuperação de numero de id
             */
            'forgot' => [
                'route' => '/forgot',
                'controller' => 'indexController',
                'action' => 'forgot'
            ],

            //!Básicas

            //Rotas do dashboard do cliente

            'clientDashboard' => [
                'route' => '/client/dashboard',
                'controller' => 'dashboardController',
                'action' => 'clientDashboard'
            ],

            'clientCarDashboard' => [
                'route' => '/client/car',
                'controller' => 'dashboardController',
                'action' => 'clientCar'
            ],

            'clientServiceDashboard' => [
                'route' => '/client/services',
                'controller' => 'dashboardController',
                'action' => 'clientServices'
            ],

            'clientReportDashboard' => [
                'route' => '/client/report',
                'controller' => 'dashboardController',
                'action' => 'clientReport'
            ],

            'infoCliente' => [
                'route' => '/cliente/info',
                'controller' => 'dashboardController',
                'action' => 'info'
            ],
            
            //Rotas dashboard oficina

            'oficinaDashboard' => [
                'route' => '/oficina/dashboard',
                'controller' => 'dashboardController',
                'action' => 'oficinaDashboard'
            ],

            //Rotas de açoes da oficina

            /**
             * Todas as rotas, acoes e controllers para oficina devem ser definidas aqui
             */
            'infoClienteOficina' => [
                'route' => 'cliente/info',
                'controller' => 'oficinaController',
                'action' => 'infoCliente'
            ],

            'newService' => [
                'route' => '/service/new',
                'controller' => 'serviceController',
                'action' => 'create'
            ],

            'registerC' => [
                'route' => '/create',
                'controller' => 'clientController',
                'action' => 'create'
            ],


            //Relatórios

            //Acessa página para configurar relatorio
            'relatorioOficina' => [
                'route' => '/oficina/report',
                'controller' => 'reportOficinaController',
                'action' => 'report'
            ],

            //Ação para gerar o relatório após configurado
            'createReport' => [
                'route' => '/oficina/createRelatorio',
                'controller' => 'reportOficinaController',
                'action' => 'createReport'
            ],


            //Acessar página para configurar relatório cliente
            'relatorioCliente' => [
                'route' => '/client/relatorio',
                'controller' => 'reportClientController',
                'action' => 'report'
            ],

            //Ação de gerar relatorio dliente
            'gerarRelatorio' => [
                'route' => '/gerarRelatorio',
                'controller' => 'reportClientController',
                'action' => 'gerar'
            ],

            

            //cadastros carro
            'registerCar' => [
                'route' => '/car/new',
                'controller' => 'carController',
                'action' => 'index'
            ],

            'register' => [
                'route' => '/register',
                'controller' => 'carController',
                'action' => 'create'
            ],

            'info' => [
                'route' => '/car/info',
                'controller' => 'carController',
                'action' => 'find'

            ],

            //cadastro cliente
            'registerClient' => [
                'route' => '/client/new',
                'controller' => 'clientController',
                'action' => 'index'
            ],

            

            //Rotas de autenticacao e saida
            'autenticar' => [
                'route' => '/auth',
                'controller' => 'authController',
                'action' => 'autenticar'
            ],

            'logout' => [
                'route' => '/logout',
                'controller' => 'authController',
                'action' => 'logout'
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