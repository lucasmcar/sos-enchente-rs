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
                <li><a href="/ver-abrigos-pets">Abrigos Pets</a></li>     
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
    <li><a href="/about">Sobre</a></li> 
</ul>

<div class="container">

<?php if(isset($this->view->itens['retorno']) && $this->view->itens['retorno'] == "Sem Resultado"){ ?>
    <div class="col s12 m7">
        <h2 class="header">Resultado</h2>
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
        <h2 class="header">Itens necessários</h2>
        <p>Verifique aqui os itens necessários para serem doados</p>
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                <div id="preloader" class="preloader-wrapper big active" style="display: none;">
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
                    <div id="data">
                        <div class="row">
                            <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="search" type="text" name="filtro" class="validate">
                                    <label for="search">Buscar Itens</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>
                            </div>
                            </form>
                        </div>
                        <table id="itens">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                    <th>Tipo</th>
                                    <th>Data de Cadastro</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($this->view->itens as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['nome'];?></td>
                                        <td><?= $value['quantidade'];?></td>
                                        <td><?= $value['nome_tipo'];?></td>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show preloader
            var preloader = document.getElementById('preloader');
            preloader.style= 'display: block';

            // Make request to server
            fetch('/ver-doacoes')
                .then((response) => response.json())
                .then(data => {

                    console.log(data)
                    // Hide preloader
                    preloader.style.display = 'none';

                    // Display data in the 'data' div
                    var dataDiv = document.getElementById('data');
                    dataDiv.innerHTML = JSON.stringify(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Hide preloader in case of error
                    preloader.style.display = 'none';
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

    let inputSearch = document.getElementById("search");
    inputSearch.addEventListener('keyup', ()=>{
    let filtro = inputSearch.value.toLowerCase();
    

    fetch('/doacoes/filtro', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `filtro=${filtro}`
    })
    .then((resp) =>resp.json())
    .then((data) => {
        console.log(data);
        let aviso = document.querySelector(".helper-text");
        if(data.retorno == "Sem Resultado"){
            aviso.style.color = "red";
            aviso.innerHTML = `Sem resultados para "${filtro}"`;
        } else if(data.length >= 1) {
            aviso.style.color = "black";
            aviso.innerHTML = `Resultados encontrados para "${filtro.length == 0 ? "todos" : filtro}": ${data.length}`;
        }
        let tabelaResultados = document.getElementById('itens');
        const tbody = tabelaResultados.querySelector('tbody');

        // Limpa o conteúdo anterior da tabela
        tbody.innerHTML = '';

        // Renderiza as linhas da tabela de acordo com os resultados
        data.forEach(resultado => {
            
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
    </script>
</body>
</html>