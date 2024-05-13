<?php

//básicas
$router->get('/', 'IndexController@index');
$router->get('/about', 'IndexController@about');
$router->get('/info', 'IndexController@info');
$router->get('/ajude', 'IndexController@doar');


//Rotas das doações e locais
$router->post('/nova/doacao', 'ItensDoacaoController', 'create');
$router->get('/ver-doacoes', 'ItensDoacaoController', 'verDoacoes');
$router->get('/ver-doacoes/pagina/{pagina}', 'ItensDoacaoController', 'verDoacoes');
$router->get('/doacoes/filtro/{filtro}', 'ItensDoacaoController', 'filtroDoacoes');
$router->get('/ver-locais', 'LocalDoacaoController', 'verLocais');
$router->get('/ver-locais/pagina/{pagina}', 'LocalDoacaoController', 'verLocais');
$router->post('/novo/local-doacao', 'LocalDoacaoController', 'create');
$router->get('/local/filtro/{filtro}', 'LocalDoacaoController', 'filtroLocal');

//Excel e pdf local e doações
$router->get('/local/export-excel', 'LocalDoacaoController', 'convertToExcel');
$router->get('/local/export-pdf', 'LocalDoacaoController', 'convertToPdf');
$router->get('/doacao/export-excel', 'ItensDoacaoController', 'convertToPdf');
$router->get('/doacao/export-pdf', 'ItensDoacaoController', 'convertToPdf');

//rotas de civis/pets e abrigos
$router->post('/novo/abrigo', 'LocalAbrigoController', 'create');
$router->get('/ver-abrigos', 'LocalAbrigoController', 'verAbrigos');
$router->get('/ver-abrigos/pagina/{pagina}', 'LocalAbrigoController', 'verAbrigos');
//$router->post('/novo', 'LocalAbrigoController', 'verAbrigos');
$router->get('/abrigo/filtro/{filtro}', 'LocalAbrigoController', 'filtroAbrigo');

$router->notFound(function(){
    include '../App/Views/not-found/not-found.php';
});