<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
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

                <ul class="collection">
                    <li class="collection-item avatar">
                        <img src="/assets/imgs/add-location.png" alt="" class="circle">
                        <span class="title">1. Local</span>
                        <p>Cadastre o local onde <br>
                            estão recebendo doações
                        </p>
                    </li>
                    <li class="collection-item avatar">
                        <img src="/assets/imgs/solidarity.png" alt="" class="circle">
                        <span class="title">2. Doações</span>
                        <p>Após cadastro do local, <br>
                            cadastre os itens que estão precisando.
                        </p>
                    </li>
                    <li class="collection-item avatar">
                    <i class="material-icons circle green">insert_chart</i>
                        <span class="title">Title</span>
                        <p>First Line <br>
                            Second Line
                        </p>
                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">play_arrow</i>
                        <span class="title">Title</span>
                        <p>First Line <br>
                            Second Line
                        </p>
                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <!--Card local doação -->
            <div class="col s6 m6">
                <div class="card green darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">Locais</span>
                        <p>
                            Cadastrar novos locais para doações.
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#mdlLocal" class="btn modal-trigger green lighten-2">Cadastrar</a>
                    </div>
                </div>
            </div>
            <!--/Card local doação -->
            <!--Card novas doações -->
            <div class="col s6 m6">
                <div class="card green darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">Doações</span>
                        <p>
                            Cadastrar as doações mais urgentes.
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#mdlDoacao" class="btn modal-trigger green lighten-2">Cadastrar</a>
                    </div>
                </div>
            </div>
            <!--/Card novas doações -->

            <!--Card cadastro de abrigos pessoas e pets -->
            <div class="col s6 m6">
                <div class="card green darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">Abrigos</span>
                        <p>
                            Cadastrar locais de abrigos.
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#mdlAbrigoPessoaPet" class="btn modal-trigger green lighten-2">Cadastrar</a>
                    </div>
                </div>
            </div>
            <!--/Card cadastro de abrigos pessoas e pets-->

            <!--Card cadastro de pessoas e pets -->
            <div class="col s6 m6">
                <div class="card green darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">Pessoas e Pets</span>
                        <p>
                            Cadastrar pessoas ou pets.
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#mdlPessoaPet" class="btn modal-trigger green lighten-2">Cadastrar</a>
                    </div>
                </div>
            </div>
            <!--/Card cadastro  pessoas e pets-->
            
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
                <div class="col s4">
                        <small>
                        Desenvolvido por Code Experts Sistemas &copy <?php echo date('Y'); ?>
                        </small>
                    </div>
                    <div class="col s2">
                    <img src="/assets/imgs/rs.png" alt="Bandeira do RS" width="32" height="32">
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
            <small>Descreva aqui os itens necessários, mais urgentes para serem doados.</small>
            <form method="post" action="#">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="txt_nome" name="nome" type="text" class="validate">
                        <label for="txt_nome">Nome do item:</label>
                    </div>
                    <div class="input-field col s6">
                        <select id="slc_tipo" name="tipo">
                            <option value="">Escolha</option>
                            <?php if(!empty($this->view->dataSelect) && !isset($this->view->dataSelect['retorno'])) { ?>
                              <?php foreach($this->view->dataSelect as $key => $value) { ?>
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
                            <?php if(!empty($this->view->dataSelectLocal) && !isset($this->view->dataSelectLocal['retorno'])) { ?>
                              <?php foreach($this->view->dataSelectLocal as $key => $value) { ?>
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
        <div class="modal-footer">
        </div>
    </div>

    <!-- Modal Abrigo -->
    <div id="mdlAbrigoPessoaPet" class="modal">
        <div class="modal-content">
            <h4>Cadastro de abrigos</h4>

            <form method="post" action="#">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="txt_nome_abrigo" name="nome_abrigo" type="text" class="validate">
                        <label for="txt_nome_abrigo">Nome:</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="txt_logradouro_abrigo" name="logradouro_abrigo" type="text" class="validate">
                        <label for="txt_logradouro_abrigo">Logradouro:</label>
                    </div>
                    <div class="input-field col s2">
                        <input id="txt_numero_abrigo" name="numero" type="text" class="validate">
                        <label for="txt_numero_abrigo">N°:</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="txt_bairro_abrigo" name="bairro" type="text" class="validate">
                        <label for="txt_bairro_abrigo">Bairro:</label>
                    </div>
                </div>
                <div class="row">
                
                    <div class="input-field col s6">
                        <input id="txt_cidade_abrigo" name="cidade" type="text" class="validate">
                        <label for="txt_cidade_abrigo">Cidade:</label>
                    </div>
                    <div class="input-field col s2">
                    <input id="txt_uf_abrigo" name="uf" type="text" class="validate">
                    <label for="txt_uf_abrigo">UF:</label>
                  </div>
                </div>
                <div class="row">
                  <button class="btn light-green darken-2" id="submitLocalAbrigo" type="submit" name="">Cadastrar Abrigo
                    <i class="material-icons right">send</i>
                  </button>
                </div>
            </form>

            
        </div>
        <div class="modal-footer">
            <a href="/novo/abrigo" class="modal-close waves-effect waves-green">Cadastrar Abrigo</a>
        </div>
    </div>


    <!-- Modal Onde Doar -->
    <div id="mdlLocal" class="modal">
        <div class="modal-content">
            <h4>Local para doações</h4>
            <form method="post" action="#">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="txt_nome_local" name="nome_local" type="text" class="validate">
                        <label for="txt_nome_local">Nome:</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="txt_logradouro" name="logradouro_doacao" type="text" class="validate">
                        <label for="txt_logradouro">Logradouro:</label>
                    </div>
                    <div class="input-field col s2">
                        <input id="txt_numero" name="numero" type="text" class="validate">
                        <label for="txt_numero">N°:</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="txt_bairro" name="bairro" type="text" class="validate">
                        <label for="txt_bairro">Bairro:</label>
                    </div>
                </div>
                <div class="row">
                
                    <div class="input-field col s6">
                        <input id="txt_cidade" name="cidade" type="text" class="validate">
                        <label for="txt_cidade">Cidade:</label>
                    </div>
                    <div class="input-field col s2">
                        <input id="txt_uf" name="uf" type="text" class="validate">
                        <label for="txt_uf">UF:</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="txt_telefone" name="uf" type="text" class="validate">
                        <label for="txt_telefone">Telefone:</label>
                    </div>
                </div>
                <div class="row">
                  <button class="btn light-green darken-2" id="submitLocal" type="submit" name="">Cadastrar Local
                    <i class="material-icons right">send</i>
                  </button>
                </div>
            </form>
            
        </div>
        <div class="modal-footer">
            <a href="/novo/local-doacao" class="modal-close waves-effect waves-green btn-flat">Cadastrar local</a>
        </div>
    </div>

    <!-- Model cadastro pessoas ou pet -->
    <div id="mdlPessoaPet" class="modal">
        <div class="modal-content">
            <h4>Cadastro de pessoas ou pets</h4>
            
        </div>
        <div class="modal-footer">
            <a href="/nova/pessoa-pet" class="modal-close waves-effect waves-green btn-flat">Cadastrar local</a>
        </div>
    </div>


    <!-- Importando jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Importando Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="../../../../assets/js/functions.js"></script>
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
    });

    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems, {});
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

    let telefone = document.getElementById('txt_telefone');

    telefone.addEventListener('keyup', (event)=>{
        // Get the input value and remove non-digit characters
        let input = event.target.value.replace(/\D/g, '');

        // Check if the input length is less than 11 characters
        if (input.length < 11) {
            // Apply the mask for phone numbers with 10 digits (e.g., (11) 91234-5678)
            input = input.replace(/^(\d{2})(\d{4,5})(\d{4})$/, '($1) $2-$3');
        } else {
            // Apply the mask for phone numbers with 11 digits (e.g., (11) 99123-4567)
            input = input.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        }

        // Set the formatted value back to the input field
        event.target.value = input;
    });
    </script>
</body>
</html>