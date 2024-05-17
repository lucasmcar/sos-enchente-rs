<?php 
    use App\Helper\DateTimeHelper;
?>
<div class="container">

<?php if(isset($this->view->abrigoPets['retorno']) && $this->view->abrigoPets['retorno'] == "Sem Resultado"){ ?>
    <div class="col s12 m7">
        <h4 class="header">Sem dados</h4>
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    <p>Não há itens cadastrados</p>
                </div>
            </div>
        </div>
    </div>
<?php exit;}?>
    <div class="col s12 m7">
        <h2 class="header">Abrigos</h2>
        <p>Verifique aqui os abrigos que ainda possuem vaga</p>
        <div class="card">
            <div class="card-content">
                <div id="data-abrigo">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 l12">
                                    <input id="abrigo-pet" type="text" name="filtro_local" class="validate">
                                    <label for="abrigo-pet">Buscar Locais</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s10 l12">
                                    <div class="progress" id="preloader-abrigo-1" style="display: none;">
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
                                        <a href="/abrigo/export-pdf">
                                            PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/abrigo/export-excel">
                                            EXCEL
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col s12 l12">

                                <table id="abrigos-pets" class="responsive-table highlight">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Logradouro</th>
                                        <th>Numero</th>
                                        <th>Bairro</th>
                                        <th>Cidade</th>
                                        <th>UF</th>
                                        <th>Tipo</th>
                                        <th>Vagas</th>
                                        <th>Telefone</th>
                                        
                                        <th>Cadastrado Em</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($this->view->abrigoPets as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value['nome'];?></td>
                                            <td><?= $value['logradouro'];?></td>
                                            <td><?= $value['numero'];?></td>
                                            <td><?= $value['bairro'];?></td>
                                            <td><?= $value['cidade'];?></td>
                                            <td><?= $value['uf'];?></td>
                                            <td><?= isset($value['tipo']) ? $value['tipo'] : "Desconhecido";?></td>
                                            <td><?= $value['vagas'];?></td>
                                            <td><?= $value['telefone'];?></td>
                                            <td><?= DateTimeHelper::toNormalFormat($value['dtcadastro']);?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            </div>
                        </div>



                        
                    <ul class="pagination">
                        <li class="<?php echo $pagina <= 1 ? 'disabled' : ''; ?>"><a href="ver-abrigo/pagina/1">Primeira</a></li>
                        <?php for ($i = 1; $i <= $this->view->totalPaginas; $i++): ?>
                        <li class="<?php echo $this->view->paginaAtiva  == $i? 'active green darken-1' : ''; ?>"><a href="ver-abrigo/pagina/<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                        <li class="<?php echo $pagina >= $this->view->totalPaginas ? 'disabled' : ''; ?>"><a href="ver-abrigo/pagina/<?php echo $this->view->totalPaginas; ?>">Última</a></li>
                    </ul>

                </div>      
                </div>
            
        </div>
    </div>
</div>
<!--modal carregar dados -->
<div id="modalLoading" class="modal">
    <div class="modal-content">
        <div id="preloader-abrigo" class="preloader-wrapper big active" style="display: none;">
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
    var dataAbrigo = document.getElementById('data-abrigo');
    var preloaderAbrigo = document.getElementById('preloader-abrigo');
    var modalLoading = document.getElementById('modalLoading');
    var instance = M.Modal.init(modalLoading, {
        dismissible: false, // Impede que o modal seja fechado clicando fora dele
        opacity: 0.5, // Define a opacidade do modal
        startingTop: '10%', // Define a posição inicial do modal
        endingTop: '20%' // Define a posição final do modal
    });

    
     // Exibe a modal
    instance.open();
    dataAbrigo.style.display = "none";
    preloaderAbrigo.style.display = "block";
    let fetch = new Fetch('http://localhost:8000');

    fetch.get('/ver-abrigos')
    .then(data => {
            instance.close();
            preloaderAbrigo.style.display = "none";
            dataAbrigo.style.display = "block";
        })
        .catch(error => {
            console.error('Error:', error);
            instance.close();
        });
});

let inputSearchAbrigoPet = document.getElementById("abrigo-pet");

inputSearchAbrigoPet.addEventListener('keyup', ()=>{
    let preloaderSearchAbrigo = document.getElementById('preloader-abrigo-1');
    let filtro = inputSearchAbrigoPet.value.toLowerCase();
        
    preloaderSearchAbrigo.style.display = 'block';
    
    let fetch = new Fetch("http://localhost:8000")
    let uri = decodeURI(`/abrigo-pet/filtro/${filtro}`)
    fetch.get(uri,{'Content-Type': 'application/json'}, "json")
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
            preloaderSearchAbrigo.style.display = 'none';
            let tabelaResultados = document.getElementById('abrigos-pets');
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
