<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>SOS Enchente - RS</title>
</head>
<body>
<nav>
    <div class="nav-wrapper  green darken-1">
        <div class="container">
            <a href="/" class="brand-logo">SOS Enchente - RS</a>
            <a href="#" data-target="menu-mobile" class="sidenav-trigger">
                <i class="material-icons">dehaze</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/">Inicio</a></li>
                <li><a href="/ver-doacoes">O que precisa?</a></li>
                <li><a href="/ver-locais">Locais de doação</a></li>
                <li><a href="/ver-abrigos"> Abrigos</a></li>     
                <li><a href="/about">Sobre</a></li>     
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h4>Por que?</h4>
    <p>
        A ideia desse projeto foi pensada para ajudar a população do RS, meu Estado, 
        que sofreu com as terriveis enchentes do final do mês de abril e ínicio de maio.
    </p>
    <p>
        Com a colaboraçao do meu amigo e também desenvolvedor Éberson, esperamos entregar esse projeto o quanto antes para 
        que mais pessoas tenham o acesso
    </p>
    <p>
        Como não poderia ajudar com dinheiro eu resolvi usar os meus conhecimentos com desenvolvimento de sistemas para desenvolver esse projeto de forma totalmente gratuita, 
        inclusive sua hospedagem, para as pessoas poderem registrar dados como:
        <ul>
            <li>O que estão precisando?</li>
            <li>Onde há abrigos e quantas vagas?</li>
            <li>Onde há postos para recolher doações</li>
            <li>Encontrar familiares em abrigos de forma mais organizada</li>
        </ul>
    </p>
    <h4>Responsabilidades</h4>
    <p>
        Nos comprometemos em validar os cadastros, juntamente aos dados das prefeituras para que não haja 
        desinformação e assim, evitar colocar outras pessoas em perigo, que estão buscando ajudar 
        e também em busca de seus parentes.
        Contamos nesse momento com a colaboração de todas as pessoas interessadas em ajudar.
    </p>
</div>

<!-- Importando jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Importando Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="../../../../assets/js/functions.js"></script>
    <script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });


    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {
            edge: 'left'
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Obtém o caminho da URL atual
        var path = window.location.pathname;

        // Seleciona a lista da navbar
        var navbarList = document.querySelector('.right');

        // Seleciona todos os itens da lista da navbar
        var links = navbarList.querySelectorAll('li');

        // Itera sobre os links da navbar
        links.forEach(function(link) {
            var href = link.querySelector('a').getAttribute('href');
            // Verifica se o atributo href do link corresponde ao caminho da URL atual
            if (href === path) {
                // Adiciona a classe 'active' ao link correspondente
                link.classList.add('active');
            }
        });
    });
    </script>
</body>
</html>