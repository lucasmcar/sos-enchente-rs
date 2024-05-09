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
                <li><a href="/ver-abrigos-pets">Abrigos de Pets</a></li>     
                <li><a href="/about">Sobre</a></li>     
            </ul>
        </div>
    </div>
</nav>
<ul class="sidenav" id="menu-mobile">
    <li><a href="/">Inicio</a></li>
    <li><a href="/ver-doacoes">O que precisa?</a></li>
    <li><a href="/ver-locais">Locais de doação</a></li>
    <li><a href="/ver-abrigos">Abrigos</a></li>
    <li><a href="/ver-abrigos-pets">Abrigos de Pets</a></li>
    <li><a href="/about">Sobre</a></li>
</ul>
<div class="container">
    <h4>Por que?</h4>
    <p>
        A ideia desse projeto foi pensada para ajudar a população do RS, população da Grande Porto Alegre
        que sofreu com as terriveis enchentes do final do mês de abril e ínicio de maio.
    </p>
    <p>
        Com a colaboraçao do meu amigo e também desenvolvedor Éberson, esperamos entregar esse projeto o quanto antes para 
        que mais pessoas tenham o acesso
    </p>
    <p>
        Como não poderia ajudar com dinheiro eu resolvi usar os meus conhecimentos com desenvolvimento de sistemas para desenvolver esse projeto de forma totalmente gratuita, 
        inclusive sua hospedagem, para que se possam registrar dados como:
        <ul>
            <li>O que estão precisando?</li>
            <li>Onde há abrigos e quantas vagas?</li>
            <li>Onde há postos para recolher doações?</li>
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

    <h4>Que dados esse site coleta?</h4>
    <p>
        Esse site coleta apenas informações básicas sobre localização de abrigos, 
        pessoas e itens necessários para doação
    </p>
    <p>
        Nós não coletamos dados sensíveis como CPF.
    </p>
    <p>
        Nós apenas estamos oferencendo uma forma de registro e pesquisa de informações
    </p>
</div>
<footer class="page-footer  green darken-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text"></h5>
                    <p class="grey-text text-lighten-4">Esse sistema foi projetado para registrar locais de doação e o que precisa ser doado para as pessoas
                        vitimas das enchentes do RS.
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col s4">
                        <small>
                        Desenvolvido por Code Experts Sistemas &copy <?php echo date('Y'); ?>
                        </small>
                    </div>
                    <div class="col s2">
                    <img src="/assets/imgs/rs.png" alt="Bandeira do RS" width="32" height="32">
                    </div>
                    <div class="col s6">
                        <small>
                          CNPJ 52.916.779/0001-93
                        </small>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>


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