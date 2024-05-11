<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>SOS Enchente - RS</title>
</head>
<body>
<ul id="drpDoacao" class="dropdown-content">
  <li><a href="/ver-doacoes">O que precisa?</a></li>
  <li><a href="/ver-locais">Locais de doação</a></li>
</ul>
<ul id="drpPessoasPets" class="dropdown-content">
    <li><a href="/ver-abrigos"> Abrigos</a></li>     
    <li><a href="/ver-abrigos-pets">Abrigos Pets</a></li>  
</ul>
<nav>
    <div class="nav-wrapper  green darken-1">
        <div class="container">
            <a href="/" class="brand-logo">SOS Enchente - RS</a>
            <a href="#" data-target="menu-mobile" class="sidenav-trigger">
                <i class="material-icons">dehaze</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/">Inicio</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="drpDoacao">Doações<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="drpPessoasPets">Pessoas<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="/info">Informações</a></li>
                <li><a href="/ajude">Faça sua doação</a></li>    
                <li><a href="/about">Sobre</a></li>     
            </ul>
        </div>
    </div>
</nav>
<ul class="sidenav" id="menu-mobile">
    <li><a href="/">Inicio</a></li>
    <li><a href="/ver-doacoes">O que precisa?</a></li>
    <li><a href="/ver-locais">Locais de doação</a></li>
    <li><a href="/ver-abrigos"> Abrigos</a></li>     
    <li><a href="/ver-abrigos-pets">Abrigos Pets</a></li>  
    <li><a href="/info">Informações</a></li> 
    <li><a href="/ajude">Faça sua doação</a></li>   
    <li><a href="/about">Sobre</a></li> 
</ul>
<div class="container">
    <div class="row">
        <div class="col s6 m6">
            <canvas id="myChart">

            </canvas>
        </div>
        <div class="col s6 m6">
            <canvas id="myChart2">

            </canvas>
        </div>
    </div>
</div>


<!-- Importando jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Materializa -->                        
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {
            hover : true
        });
    });

    $(".dropdown-trigger").dropdown();

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


const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const ctx2 = document.getElementById('myChart2');

  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# Tipos de doações',
        data: [12, 25, 3, 7, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</body>
</html>