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
            </ul>
        </div>
    </div>
</nav>

<div id="preloader" class="preloader-wrapper big active" style="display: none;">
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
                    <div id="data">

                        <table>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show preloader
            var preloader = document.getElementById('preloader');
            preloader.style= 'display: block';

            // Make request to server
            fetch('/ver-doacoes')
                .then(response => response.json())
                .then(data => {
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
    </script>
</body>
</html>