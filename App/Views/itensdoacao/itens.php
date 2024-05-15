<?php 
use App\Helper\DateTimeHelper;
?>

<div class="container">
    <div class="row">
    <?php if(isset($this->view->itens['retorno']) && $this->view->itens['retorno'] == "Sem Resultado"){ ?>
    <div class="col s12 l12 m7">
        <h2 class="header">Resultado</h2>
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    <p>Não há itens cadastrados</p>
                </div>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="col s12 l12 m7">
        <h4 class="header">Itens necessários</h4>
        <p>Verifique aqui os itens necessários para serem doados</p>
        <div class="card">
            <div class="card-content">
                <div id="data-items">
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s10 l12 m12">
                                        <input id="search" type="text" name="filtro" class="validate">
                                        <label for="search">Buscar Itens</label>
                                        <span class="helper-text" data-error="wrong" data-success="right"></span>
                                    </div>
                                    <div class="col s10 m12 l12">
                                        <div class="progress" id="preloader-search-item" style="display: none;">
                                            <div class="indeterminate"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <a class='dropdown-trigger btn' href='#' data-target='convert'>
                                        Exportar para...
                                    </a>

                                    <!-- Dropdown Structure -->
                                    <ul id='convert' class='dropdown-content'>
                                        <li>
                                            <a href="/doacao/export-pdf">
                                                PDF
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/doacao/export-excel">
                                                EXCEL
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col s12 l12">
                                <table id="itens" class="responsive-table highlight">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Quantidade</th>
                                        <th>Tipo</th>
                                        <th>Local</th>
                                        <th>Telefone</th>
                                        <th>Data de Cadastro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->view->itens as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value['nome'];?></td>
                                            <td><?= $value['quantidade'];?></td>
                                            <td><?= $value['nome_tipo'];?></td>
                                            <td><?= $value['nome_local'];?></td>
                                            <td><?= $value['telefone'];?></td>
                                            <td><?= DateTimeHelper::toNormalFormat($value['dtcadastro']);?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        
                        <ul class="pagination">
                            <li class="<?php echo $pagina <= 1 ? 'disabled' : ''; ?>"><a href="ver-doacoes/pagina/1">Primeira</a></li>
                            <?php for ($i = 1; $i <= $this->view->totalPaginas; $i++): ?>
                            <li class="<?php echo $this->view->paginaAtiva  == $i? 'active green darken-1' : ''; ?>"><a href="/ver-doacoes/pagina/<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php endfor; ?>
                            <li class="<?php echo $pagina >= $this->view->totalPaginas ? 'disabled' : ''; ?>"><a href="/ver-doacoes/pagina/<?php echo $this->view->totalPaginas; ?>">Última</a></li>
                        </ul>

                    </div>      
                    </div>
                </div>
            
        </div>
            
    </div>
    <?php } ?>
    </div>
</div>

<div class="fixed-action-btn">
    <a href="#mdlDoacaoV" class="btn modal-trigger btn-floating btn-large green">
        <i class="large material-icons">create</i>
    </a>
</div>

<!-- Modal Doação -->
<div id="mdlDoacaoV" class="modal">
        <div class="modal-content">
            <h5>Adicionar itens?</h5>
            <small>Adicione itens necessários.</small>
            <form method="post" action="#">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="txt_nome" name="nome" type="text" class="validate">
                        <label for="txt_nome">Nome do item:</label>
                    </div>
                    <div class="input-field col s6">
                        <select id="slc_tipo" name="tipo">
                            <option value="">Escolha</option>
                            <?php if(!empty($this->view->dataSelectV) && !isset($this->view->dataSelectV['retorno'])) { ?>
                              <?php foreach($this->view->dataSelectV as $key => $value) { ?>
                                <option value="<?= $value['idtipo_doacao'];?>"><?=$value['nome']; ?></option>
                              <?php }?>
                            <?php } ?>
                        </select>
                        <label>Tipo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="txt_qtd" name="quantidade" type="text" class="validate">
                        <label for="txt_qtd">Quantidade:</label>
                    </div>
                    <div class="input-field col s6">
                        <select id="slc_local" name="local">
                            <option value="">Escolha</option>
                            <?php if(!empty($this->view->dataSelectLocalV) && !isset($this->view->dataSelectLocalV['retorno'])) { ?>
                              <?php foreach($this->view->dataSelectLocalV as $key => $value) { ?>
                                <option value="<?= $value['idlocaldoacao'];?>"><?=$value['nome']; ?></option>
                              <?php }?>
                            <?php } ?>
                        </select>
                        <label>Local</label>
                  </div>
                </div>
                <div class="row">
                  <button class="btn light-green darken-2" id="submitItens" type="submit" name="">Cadastrar doação
                    <i class="material-icons right">send</i>
                  </button>
                </div>
            </form>
        </div>
    </div>

<!--modal sucesso-->
<div id="successModalItens" class="modal">
    <div class="modal-content">
        <h4>Sucesso!</h4>
        <p>Dados inseridos com sucesso.</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
    </div>
</div>

<div id="modalLoadingItens" class="modal">
    <div class="modal-content valign-wrapper center-align">
        <div id="preloader" class="preloader-wrapper big active valign" style="display: none;">
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

<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/inits.js"></script>
<script src="/assets/js/functions.js"></script>
<script>

$(document).ready(function(){
    $('.sidenav').sidenav();
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {
        opacity: 0.7
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {});
  });


document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, {
        hover : true
    });
});

document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems, {});
});

$(".dropdown-trigger").dropdown();

document.addEventListener('DOMContentLoaded', function() {
    // Show preloader
    var modalLoading = document.getElementById('modalLoadingItens');
    var dataItens = document.getElementById('data-items');
    var preloader = document.getElementById('preloader');
    var instance = M.Modal.init(modalLoading, {
        dismissible: false, // Impede que o modal seja fechado clicando fora dele
        opacity: 0.5, // Define a opacidade do modal
        startingTop: '10%', // Define a posição inicial do modal
        endingTop: '20%' // Define a posição final do modal
    });

    dataItens.style.display = "none";
    let fetch = new Fetch("http://localhost:8000");
    preloader.style.display = 'block';
    modalLoading.style.alignItems= "center"
    instance.open()
    
    fetch.get('/ver-doacoes', {"Content-Type" : "application/json"})
    .then(data => {

        // Hide preloader
        preloader.style.display = 'none';

        // Display data in the 'data' div
        //var dataDiv = document.getElementById('data');
        //dataDiv.innerHTML = JSON.stringify(data);
        instance.close();
        dataItens.style.display = "block";

    }).catch(error => {
        console.error('Error:', error);
        // Hide preloader in case of error
        preloader.style.display = 'none';
        instance.close();
    });
    
   
});

let inputSearch = document.getElementById("search");

if(inputSearch != undefined){

    inputSearch.addEventListener('keyup', ()=>{

    var preloaderSearchItem = document.getElementById('preloader-search-item');
    preloaderSearchItem.style.display = 'block';

    let filtro = inputSearch.value.toLowerCase();
    let fetch = new Fetch("http://localhost:8000")
    
    fetch.get(`/doacoes/filtro/${filtro}`, {'Content-Type': 'application/json'}, "json")
    .then((data) => {
        
    let aviso = document.querySelector(".helper-text");
    if(typeof data.retorno != "undefined" || data.retorno == "Sem Resultado"){
        aviso.style.color = "red";
        aviso.innerHTML = `Sem resultados para "${filtro}"`;
    } else if(data.length >= 1) {
        aviso.style.color = "black";
        aviso.innerHTML = `Resultados encontrados para "${filtro.length == 0 ? "todos" : filtro}": ${data.length}`;
    }
    preloaderSearchItem.style.display = 'none';
    let tabelaResultados = document.getElementById('itens');
    const tbody = tabelaResultados.querySelector('tbody');

    // Limpa o conteúdo anterior da tabela
    tbody.innerHTML = '';

    // Renderiza as linhas da tabela de acordo com os resultados
    data.forEach(resultado => {
        
        var partes = resultado.dtcadastro.split(' ');

        // Dividindo a parte da data em ano, mês e dia
        var partesData = partes[0].split('-');
        var ano = partesData[0];
        var mes = partesData[1];
        var dia = partesData[2];

        // Construindo a data formatada
        var dataFormatada = dia + '/' + mes + '/' + ano;

        // Se houver uma parte de hora, adicione-a à data formatada
        if (partes[1]) {
            dataFormatada += ' ' + partes[1];
        }

        resultado.dtcadastro = dataFormatada;

        const tr = document.createElement('tr');
        Object.values(resultado).forEach(valor => {
            
            const td = document.createElement('td');
            td.textContent = valor;
            tr.appendChild(td);
        });
        tbody.appendChild(tr);
        });
    }).catch( e => console.log(e) );
});

}

</script>
</body>
</html>