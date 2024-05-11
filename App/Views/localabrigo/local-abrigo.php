<?php 
    use App\Helper\DateTimeHelper;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>SOS - RS</title>
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

<?php if(isset($this->view->abrigos['retorno']) && $this->view->abrigos['retorno'] == "Sem Resultado"){ ?>
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
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    <div id="data">
                        <div id="preloader-abrigo" class="preloader-wrapper big active" style="display: none;">
                            <div class="spinner-layer spinner-blue-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                    </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="abrigo" type="text" name="filtro_local" class="validate">
                                    <label for="abrigo">Buscar Locais</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>
                            </div>
                            <div class="progress" id="preloader-abrigo-1" style="display: none;">
                                <div class="indeterminate"></div>
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
                        <table id="abrigos">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Logradouro</th>
                                    <th>Numero</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th>Vagas</th>
                                    <th>Telefone</th>
                                    
                                    <th>Cadastrado Em</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($this->view->abrigos as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['nome'];?></td>
                                        <td><?= $value['logradouro'];?></td>
                                        <td><?= $value['numero'];?></td>
                                        <td><?= $value['bairro'];?></td>
                                        <td><?= $value['cidade'];?></td>
                                        <td><?= $value['uf'];?></td>
                                        <td><?= $value['vagas'];?></td>
                                        <td><?= $value['telefone'];?></td>
                                        <td><?= DateTimeHelper::toNormalFormat($value['dtcadastro']);?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <ul class="pagination">
                        <li class="<?php echo $pagina <= 1 ? 'disabled' : ''; ?>"><a href="?pagina=1">Primeira</a></li>
                        <?php for ($i = 1; $i <= $this->view->totalPaginas; $i++): ?>
                        <li class="<?php echo $this->view->paginaAtiva  == $i? 'active green darken-1' : ''; ?>"><a href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                        <li class="<?php echo $pagina >= $this->view->totalPaginas ? 'disabled' : ''; ?>"><a href="?pagina=<?php echo $this->view->totalPaginas; ?>">Última</a></li>
                    </ul>

                </div>      
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
    var preloaderAbrigo = document.getElementById('preloader-abrigo');
    preloaderAbrigo.style.display='block';

    // Make request to server
    fetch('/ver-abrigos') 
        .then((response) => response.json())
        .then(data => {
            // Hide preloader
            preloaderAbrigo.style.display = 'none';
            // Display data in the 'data' div
            var dataDiv = document.getElementById('data');
            dataDiv.innerHTML = JSON.stringify(data);
        })
        .catch(error => {
            console.error('Error:', error);
            // Hide preloader in case of error
            preloaderAbrigo.style.display = 'none';
        });
});

let inputSearchAbrigo = document.getElementById("abrigo");

inputSearchAbrigo.addEventListener('keyup', ()=>{
    let preloaderSearchAbrigo = document.getElementById('preloader-abrigo-1');
    let filtro = inputSearchAbrigo.value.toLowerCase();
        
    preloaderSearchAbrigo.style.display = 'block';
    
    fetch('/abrigo/filtro', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `filtro_abrigo=${filtro}`
    })
    .then((resp) => resp.json())
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
            let tabelaResultados = document.getElementById('abrigos');
            const tbody = tabelaResultados.querySelector('tbody');

            // Limpa o conteúdo anterior da tabela
            tbody.innerHTML = '';
            console.log(data)
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
                    console.log(valor)
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
</body>
</html>