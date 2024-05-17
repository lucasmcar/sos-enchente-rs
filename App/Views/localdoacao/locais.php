<?php 
    use App\Helper\DateTimeHelper;
?>
<div class="container">

<?php if(isset($this->view->locais['retorno']) && $this->view->locais['retorno'] == "Sem Resultado"){ ?>
    <div class="col s12 m7">
        <h4 class="header">Sem dados</h4>
        <div class="card">
            <div class="card-content">
                <p>Não há itens cadastrados</p>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="col s12 m7">
        <h4 class="header">Locais de doação</h4>
        <p>Verifique aqui os locais que recebem doação</p>
        <div class="card">
            <div class="card-content">
                <div id="data-locais">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="local" type="text" name="filtro_local" class="validate">
                                    <label for="local">Buscar Locais</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 l12">
                                    <div class="progress" id="preloader-search" style="display: none;">
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
                                        <a href="/local/export-pdf">
                                            PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/local/export-excel">
                                            EXCEL
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col s12 l12">
                            <table id="locais" class="responsive-table highlight">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Logradouro</th>
                                    <th>Numero</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th>Telefone</th>
                                    <th>Cadastrado Em</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($this->view->locais as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['nome'];?></td>
                                        <td><?= $value['logradouro'];?></td>
                                        <td><?= $value['numero'];?></td>
                                        <td><?= $value['bairro'];?></td>
                                        <td><?= $value['cidade'];?></td>
                                        <td><?= $value['uf'];?></td>
                                        <td><?= $value['telefone'];?></td>
                                        <td><?= DateTimeHelper::toNormalFormat($value['dtcadastro']);?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                        
                <ul class="pagination">
                    <li class="<?php echo $pagina <= 1 ? 'disabled' : ''; ?>"><a href="/ver-locais/pagina/1">Primeira</a></li>
                    <?php for ($i = 1; $i <= $this->view->totalPaginas; $i++): ?>
                    <li class="<?php echo $this->view->paginaAtiva  == $i? 'active green darken-1' : ''; ?>"><a href="/ver-locais/pagina/<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                    <li class="<?php echo $pagina >= $this->view->totalPaginas ? 'disabled' : ''; ?>"><a href="?pagina=<?php echo $this->view->totalPaginas; ?>">Última</a></li>
                </ul>
            </div>      
        </div>
    </div>       
<?php }?>   
</div>

<div id="modalLoadingLocais" class="modal">
    <div class="modal-content">
        <div id="preloader-local" class="preloader-wrapper big active" style="display: none;">
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

$(document).ready(function(){
    $('.sidenav').sidenav();
});

$(".dropdown-trigger").dropdown();

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, {
        hover : true
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Show preloader
    var dataDiv = document.getElementById('data-locais');
    var preloaderLocal = document.getElementById('preloader-local');
    var modalLoadingLocais = document.getElementById('modalLoadingLocais');

    
    var instance = M.Modal.init(modalLoadingLocais, {
        dismissible: false, // Impede que o modal seja fechado clicando fora dele
        opacity: 0.5, // Define a opacidade do modal
        startingTop: '10%', // Define a posição inicial do modal
        endingTop: '20%' // Define a posição final do modal
    });
    dataDiv.style.display = "none";
    instance.open();
    preloaderLocal.style.display='block';

    let fetch = new Fetch('http://localhost:8000', {"Content-Type": "application/json"}, "json");
    fetch.get('/ver-locais') 
        .then((data) => {
            // Hide preloader
            preloaderLocal.style.display = 'none';
            // Display data in the 'data' div
            instance.close();
            dataDiv.style.display = "block"
        })
        .catch(error => {
            console.error('Error:', error);
            // Hide preloader in case of error
            preloaderLocal.style.display = 'none';
            instance.close();
        });
});

let inputSearchLocal = document.getElementById("local");

inputSearchLocal.addEventListener('keyup', ()=>{
    let preloaderSearch = document.getElementById('preloader-search');
    let filtro = inputSearchLocal.value.toLowerCase();
        
    preloaderSearch.style.display = 'block';

    let fetch = new Fetch('http://localhost:8000');
    
    fetch.get(`/local/filtro/${filtro}`, {'Content-Type': 'application/json'}, "json")
    .then((data) => {
        if(data != undefined || data != null){
            let aviso = document.querySelector(".helper-text");
            if(data.retorno == "Sem Resultado"){
                aviso.style.color = "red";
                aviso.innerHTML = `Sem resultados para "${filtro}"`;
            } else if(data.length >= 1) {
                aviso.style.color = "black";
                aviso.innerHTML = `Resultados encontrados para "${filtro.length == 0 ? "todos" : filtro}": ${data.length}`;
            }
            preloaderSearch.style.display = 'none';
            let tabelaResultados = document.getElementById('locais');
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
        }
    }).catch( e => console.log(e) );
});
</script>
