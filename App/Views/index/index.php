<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>SOS - RS</title>
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
                <li><a href="/ver-abrigos">Abrigos</a></li>     
            </ul>
        </div>
    </div>
</nav>
<ul class="sidenav" id="menu-mobile">
    <li><a href="/">Inicio</a></li>0
    <li><a href="/ver-doacoes">O que precisa?</a></li>
    <li><a href="/ver-locais">Locais de doação</a></li>
    <li><a href="/ver-abrigos">Abrigos</a></li>
</ul>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>Vamos ajudar?</h3>
                <p>
                    Devido as grandes enchentes que assolaram o RS, por conta do grande volume de chuva no final 
                    do mês de abril e inicio de maio 
                    muita gente perdeu suas casas, entes queridos e muitos bens.
                </p>
                <p>
                    Essas pessoas hoje estão em abrigos e precisando constantemente de doações 
                    e quem quer doar sabem onde e/ou o que é mais urgente, mais necessário.
                </p>
                <p>
                    Estamos aqui pra ser o ponto de encontro 
                    entre as pessoas que querem doar alimentos, roupas entre outros itens e locais para doação.
                </p>
                <p>
                    Vamos juntos tornar essa corrente de solidariedade maior e ajudar.
                </p>
                <p>
                    Todos os locais cadastrados serão revisados, para que não haja nenhum problema.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col s6 m6">
                <div class="card green darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">Novos locais</span>
                        <p>
                            Cadastrar novos locais.
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#" data-target="mdlLocal">Onde doar</a>
                    </div>
                </div>
            </div>
            
            <div class="col s6 m6">
                <div class="card green darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">Novas doações</span>
                        <p>
                            Cadastrar as doações mais urgentes.
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#mdlDoacao" class="btn modal-trigger">Cadastrar</a>
                    </div>
                </div>
            </div>

            <div class="col s6 m6">
                <div class="card green darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">Abrigos</span>
                        <p>
                            Cadastrar locais onde ainda possui vaga.
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#mdlAbrigo" href="#" class="btn modal-trigger">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer  green darken-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text"></h5>
                    <p class="grey-text text-lighten-4">Esse sistema foi projetado para registrar locais de doação e o que precisa ser doado para as pessoas
                        vitimas das enchentes do RS.
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col s6">
                        <small>
                        Desenvolvido por Code Experts Sistemas &copy <?php echo date('Y'); ?>
                        </small>
                    </div>
                    <div class="col s6">
                        <small>
                          CNPJ 52.916.779/0001-93
                        </small>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Doação -->
    <div id="mdlDoacao" class="modal">
        <div class="modal-content">
            <h5>O que é preciso para doar?</h5>
            <small>Descreva aqui os items necessários, mais urgentes para serem doados.</small>
            <form action="/nova/doacao" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" name="nome" type="text" class="validate">
                        <label for="first_name">Nome do item:</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="tipo">
                            <option value="">Escolha</option>
                            <option value="1">Ração para animais</option>
                            <option value="2">Produtos de higiene pessoal</option>
                            <option value="3">Roupas</option>
                            <option value="4">Roupas de cama</option>
                            <option value="5">Kits de limpeza</option>
                            <option value="6"></option>
                        </select>
                        <label>Tipo</label>
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input id="first_name" name="quantidade" type="text" class="validate">
                    <label for="first_name">Quantidade:</label>
                  </div>
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn  green lighten-3" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>
        </div>
    </div>

    <!-- Modal Abrigo -->
    <div id="mdlAbrigo" class="modal">
        <div class="modal-content">
            <h4>Onde há abrigo?</h4>

            
        </div>
        <div class="modal-footer">
            <a href="/novo/abrigo" class="modal-close waves-effect waves-green btn-flat">Cadastrar Abrigo</a>
        </div>
    </div>


    <!-- Modal Onde Doar -->
    <div id="mdlLocal" class="modal">
        <div class="modal-content">
            <h4>Onde está ocorrendo doação?</h4>
            
        </div>
        <div class="modal-footer">
            <a href="/novo/local" class="modal-close waves-effect waves-green btn-flat">Cadastrar local</a>
        </div>
    </div>
    <!-- Importando jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Importando Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
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
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {
            edge: 'left'
        });
    })
    </script>
</body>
</html>