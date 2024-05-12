<?php 

  $labels = [];
  $values = [];
  foreach($this->view->itensPorCidade as $key => $value){
    $labels[] = $value['cidade'];
    $values[] = $value['total'];
  }

  $labels_str = json_encode($labels);
  $values_str = json_encode($values);
?>


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
<ul id="drpAbrigos" class="dropdown-content">
    <li><a href="/ver-abrigos">Ver Abrigos</a></li>
    <li><a href="/ver-abrigos-pets">Ver Abrigos Pets</a></li>
</ul>
<ul id="drpPessoasPets" class="dropdown-content">
    <li><a href="/ver-pessoas">Pessoas</a></li>     
    <li><a href="/ver-pets">Pets</a></li>  
    <li><a href="/ver-desaparecidos">Desaparecidos</a></li>  
</ul>
<nav>
    <div class="nav-wrapper  green darken-1">
        <div class="container">
            <a href="/" class="brand-logo">SOS - RS</a>
            <a href="#" data-target="menu-mobile" class="sidenav-trigger">
                <i class="material-icons">dehaze</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/">Inicio</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="drpDoacao">Doações<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="drpAbrigos">Abrigos<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="drpPessoasPets">Pessoas/Pets<i class="material-icons right">arrow_drop_down</i></a></li>
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
    <li><a href="/ver-pessoas">Pessoas</a></li>
    <li><a href="/ver-pets">Pets</a></li>
    <li><a href="/info">Informações</a></li> 
    <li><a href="/ajude">Faça sua doação</a></li>       
    <li><a href="/about">Sobre</a></li> 
</ul>
<div class="container">
    <div class="row">
        <div class="col s6 l12">
          <h4>Informações gerais</h4>
          <div class="collection">
            <a href="/ver-doacoes" class="collection-item"><span class="badge"><?= $this->view->infoTotal; ?></span>Total de itens para doação</a>
            <a href="/ver-locais" class="collection-item"><span class="badge"><?= $this->view->infoTotalLocal; ?></span>Total de locais que recebem doações</a>
            <a href="/ver-abrigos" class="collection-item"><span class="badge"><?= $this->view->infoTotalAbrigos; ?></span>Total de abrigos cadastrados</a>
          </div>
        </div>

        <div class="col s4 m6 l6">
            <canvas id="myChart">

            </canvas>
        </div>
        <div class="col s4 m6 l6">
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

<script src="/assets/js/inits.js"></script>
<script src="/assets/js/functions.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {
            hover : true
        });
    });

    $(".dropdown-trigger").dropdown();

$(document).ready(function(){
    $('.sidenav').sidenav();
});

$(".dropdown-trigger").dropdown();


const ctx = document.getElementById('myChart');

  const labels = <?php echo $labels_str; ?>;
  const values = <?php echo $values_str; ?>;

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: '# Total de itens por cidade',
        data: values,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
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