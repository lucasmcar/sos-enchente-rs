<?php 

  $labels = [];
  $labelsLocal = [];
  $values = [];
  $valuesLocal = [];
  foreach($this->view->itensPorCidade as $key => $value){
    if($value == 'Sem Resultado'){
      $labels[] = "";
      $values[] = ""; 
    } else {
      $labels[] = $value['cidade'];
      $values[] = $value['total'];
    }
    
  }

  $labels_str = json_encode($labels);
  $values_str = json_encode($values);

  foreach($this->view->itensPorLocal as $key => $value ){
    if($value == 'Sem Resultado'){
      $valuesLocal[] = "";
      $labelsLocal[] = "";
    } else {
      $labelsLocal[] = $value['nome'];
      $valuesLocal[] = $value['total'];
    }
    
  }

  $labels_local = json_encode($labelsLocal);
  $values_local = json_encode($valuesLocal);
?>

<div class="container">
  <div class="row">
    <div class="col s12 m12 l12">
      <h4>Informações gerais</h4>
      <div class="collection">
        <a href="/ver-doacoes" class="collection-item"><span class="badge"><?= $this->view->infoTotal; ?></span>Total de itens para doação</a>
        <a href="/ver-locais" class="collection-item"><span class="badge"><?= $this->view->infoTotalLocal; ?></span>Total de locais que recebem doações</a>
        <a href="/ver-abrigos" class="collection-item"><span class="badge"><?= $this->view->infoTotalAbrigos; ?></span>Total de abrigos cadastrados</a>
        <a href="/ver-abrigos-pets" class="collection-item"><span class="badge"><?= $this->view->infoTotalAbrigosPets; ?></span>Total de abrigos cadastrados para pets</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6 l6">
      <h4>Itens Por Cidade</h4>
        <canvas id="myChart"> </canvas>
    </div>
    <div class="col s12 m6 l6">
      <h4>Itens Por Local</h4>
      <canvas id="myChart2"></canvas>
    </div>
  </div>
  <div class="row">
  <div class="col s12 m6 l6">
      <h4>Abrigo por Cidade</h4>
        <canvas id="abrigoCidade"> </canvas>
    </div>
    <div class="col s12 m6 l6">
      <h4>Pessoas Por Abrigo</h4>
      <canvas id="pessoasAbrigo"></canvas>
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


//getChart([], [] ,'myChart', 'bar', "#Total de itens por cidade");
getChart( <?php echo $labels_str;?>,  <?php echo $values_str;?>  ,'myChart', 'bar', "#Total de itens por cidade");
//getChart([], [] , "myChart2", "pie", "#Itens por local");
getChart(<?php echo $labels_local; ?>, <?php echo $values_local; ?>, "myChart2", "pie", "#Itens por local");
getChart([], [], "abrigoCidade", "bar", "#Abrigos por Cidade");
getChart([], [], "pessoasAbrigo", "bar", "#Pessoas por Abrigo");

</script>
</body>
</html>