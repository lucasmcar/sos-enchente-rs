<?php
    use App\Helper\DateTimeHelper;
?>
<main>
<div class="container">
    <div class="row">
        <?php if(isset($this->view->pessoas['retorno']) && $this->view->pessoas['retorno'] == "Sem Resultado"){ ?>
            <div class="col s12 l12 m7">
                <h2 class="header">Resultado</h2>
                <div class="card">
                    
                    <div class="card-content">
                        <p>Não há pessoas cadastradas</p>
                    </div>
                    
                </div>
            </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col s12 l12">
                        <div id="data-pessoas">
                            <h4>Pessoas cadastradas</h4>
                            <h5>Total de registros encontrados: (<?= $this->view->totalPessoas; ?>)</h5>
                            <ul class="collapsible">
                                <?php foreach($this->view->pessoas as $key => $value) { ?>
                                <li>
                                    <div class="collapsible-header">
                                        <i><img src="<?= $value['imagem'] ?>" alt="Imagem de perfil" width="36" height="36" class="circle"></i>
                                        <?= $value['nome']; ?>
                                    </div>
                                    <div class="collapsible-body">
                                        <span>
                                            <img width="180" height="100" src="<?= $value['imagem']?>">
                                            <p><b>Idade:</b> <?= $value['idade']; ?></p>
                                            <p><b>Informações:</b> <?= $value['info_adicional']; ?></p>
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
    <div class="row">
        <ul class="pagination">
            <li class="<?php echo $pagina <= 1 ? 'disabled' : ''; ?>"><a href="ver-peessoas/pagina/1">Primeira</a></li>
            <?php for ($i = 1; $i <= $this->view->totalPaginas; $i++): ?>
            <li class="<?php echo $this->view->paginaAtiva  == $i? 'active green darken-1' : ''; ?>"><a href="/ver-pessoas/pagina/<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <li class="<?php echo $pagina >= $this->view->totalPaginas ? 'disabled' : ''; ?>"><a href="/ver-pessoas/pagina/<?php echo $this->view->totalPaginas; ?>">Última</a></li>
        </ul>                            
    </div>
</div>
</main>

<div id="modalLoadingPessoas" class="modal">
    <div class="modal-content valign-wrapper center-align">
        <div id="preloader-pessoas" class="preloader-wrapper big active valign" style="display: none;">
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

<!-- FAB -->
<div class="fixed-action-btn">
    <a href="#mdlFabPessoa" class="btn modal-trigger btn-floating btn-large green">
        <i class="large material-icons">create</i>
    </a>
</div>

<!-- FAB MODaL -->
<div id="mdlFabPessoa" class="modal">
    <div class="modal-content">
        <h5>Adicionar Pets?</h5>
        <small>Adicione mais pets.</small>
        <form method="POST" enctype="multipart/form-data" id="civilPet">
            <div class="row">
                <div class="col s12 l12">
                    <img id="pessoaPreview" width="200" height="auto" src="#" class="responsive-img" style="display: none;">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l6">
                    <input id="txt_nome_civil" name="nome_civil" type="text" class="validate">
                    <label for="txt_nome_civil">Nome Completo:</label>
                </div>
                <div class="input-field col s3 l2">
                    <input id="txt_idade_civil" name="idade_civil" type="text" class="validate">
                    <label for="txt_idade_civil">Idade:</label>
                </div>
                <div class="input-field col s3 l4">
                    <select readonly="readonly" id="slc_civil_pet" name="pet_civil">
                        <option value="">Selecione...</option>
                        <option value="Pet">Pet</option>
                        <option value="Civil" selected>Civil</option>
                    </select>
                </div>
                <div class="row">
                    <div class="input-field col s6 l6">
                        <select id="slc_local_civil_pet" name="local_pet_civil">
                            <option value="">Escolha</option>
                            <?php if(!empty($this->view->dataSelectAbrigo) && !isset($this->view->dataSelectAbrigo['retorno'])) { ?>
                                <?php foreach($this->view->dataSelectAbrigo as $key => $value) { ?>
                                    <?php if($value['vagas'] > 0) { ?>
                                        <option value="<?= $value['idlocal_abrigo'];?>"><?=$value['nome']; ?></option>
                                    <?php } ?>
                                <?php }?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-field col s6 l6">
                        <textarea id="txt_area_info" name="area_info" class="materialize-textarea"></textarea>
                        <label for="txt_area_info">Info Adicional</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l6">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto</span>
                                <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <button class="btn light-green darken-2" id="submitCadastroCivil" type="submit" name="">Cadastrar Civil/Pet
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--//Fab Modal-->


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

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {});
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {
        opacity: 0.7
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, {});

     /*document.getElementById("slc_civil_pet").addEventListener("change", function(){
         var selected = this.value;
        console.log(selected)
         // Verifica se o valor selecionado é '1', se sim, mostra os campos ocultos
        if (selected === 'Pet') {
          document.getElementById('hiddenFields').style.display = 'block';
        } else {
          // Se não, esconde os campos ocultos
          document.getElementById('hiddenFields').style.display = 'none';
        }

      })*/
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

function previewImage(event) {
        const preview = document.getElementById('pessoaPreview');
        let file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }

</script>