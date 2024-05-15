<?php
    use App\Helper\DateTimeHelper;
?>
<main>
<div class="container">
    <div class="row">
        <?php if(isset($this->view->pets['retorno']) && $this->view->pets['retorno'] == "Sem Resultado"){ ?>
            <div class="col s12 l12 m7">
                <h2 class="header">Resultado</h2>
                <div class="card">
                    
                    <div class="card-content">
                        <p>Não há pets cadastradas</p>
                    </div>
                    
                </div>
            </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col s12 l12">
                        <div id="data-pets">
                            <h4>Pessoas cadastradas (<?= $this->view->totalPets; ?>)</h4>
                            <ul class="collapsible">
                                <?php foreach($this->view->pets as $key => $value) { ?>
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-symbols-outlined">
                                            person
                                        </i>
                                        <?= $value['nome']; ?>
                                    </div>
                                    <div class="collapsible-body">
                                        <span>
                                            <p><b>Idade:</b> <?= $value['idade']; ?></p>
                                            <p><b>Informações:</b> <?= $value['info_adicional']; ?></p>
                                            <p><b>Raça:</b> <?= $value['raca']; ?></p>
                                            <p><b>Especie:</b> <?= $value['especie']; ?></p>
                                            <p><b>Nome do Abrigo:</b> <?= $value['nome_abrigo']; ?></p>
                                            <p><b>Endereço:</b> <?= $value['logradouro']; ?>, <?= $value['numero'] ?></p>

                                            <p><b>Data do cadastro:</b> <?= DateTimeHelper::toNormalFormat($value['dtcadastro']); ?></p>
                                            
                                        </span>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    
                    </div>
                </div>

            <?php } ?>

    </div>
</div>
</main>

<div id="modalLoadingPet" class="modal">
    <div class="modal-content valign-wrapper center-align">
        <div id="preloader-pet" class="preloader-wrapper big active valign" style="display: none;">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Importando jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Materializa -->                        
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- Inicialização de váriaveis -->
<script src="/assets/js/inits.js"></script>
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/functions.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  // Inicialize o componente Collapsible
  var elems = document.querySelectorAll('.collapsible');
  var instances = M.Collapsible.init(elems, {});
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, {
        hover : true
    });
});

$(".dropdown-trigger").dropdown();

document.addEventListener('DOMContentLoaded', function() {
    // Show preloader
    var modalLoadingPessoas = document.getElementById('modalLoadingPessoas');
    var dataPessoas = document.getElementById('data-pessoas');
    var preloaderPessoas = document.getElementById('preloader-pessoas');
    var instance = M.Modal.init(modalLoadingPessoas, {
        dismissible: false, // Impede que o modal seja fechado clicando fora dele
        opacity: 0.5, // Define a opacidade do modal
        startingTop: '10%', // Define a posição inicial do modal
        endingTop: '20%' // Define a posição final do modal
    });

    dataPessoas.style.display = "none";
    let fetch = new Fetch("http://localhost:8000");
    preloaderPessoas.style.display = 'block';
    modalLoadingPessoas.style.alignItems= "center"
    instance.open()
    
    fetch.get('/ver-pessoas', {"Content-Type" : "application/json"})
    .then(data => {

        // Hide preloader
        preloaderPessoas.style.display = 'none';

        // Display data in the 'data' div
        //var dataDiv = document.getElementById('data');
        //dataDiv.innerHTML = JSON.stringify(data);
        instance.close();
        dataPessoas.style.display = "block";

    }).catch(error => {
        console.error('Error:', error);
        // Hide preloader in case of error
        preloaderPessoas.style.display = 'none';
        instance.close();
    });
    
   
});
</script>