<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>SOS Enchente</title>
</head>
<body>
<ul id="drpDoacao" class="dropdown-content">
  <li><a href="/ver-doacoes">O que precisa?</a></li>
  <li><a href="/ver-locais">Locais de doação</a></li>
</ul>
<ul id="drpPessoasPets" class="dropdown-content">
    <li><a href="/ver-abrigos"> Abrigos</a></li>     
    <li><a href="/ver-abrigos-pets">Abrigos Pets</a></li>  
</ul>
<nav>
    <div class="nav-wrapper  green darken-1">
        <div class="container">
            <a href="/" class="brand-logo">SOS Enchente - RS</a>
            <a href="#" data-target="menu-mobile" class="sidenav-trigger">
                <i class="material-icons">dehaze</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/">Inicio</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="drpDoacao">Doações<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="drpPessoasPets">Pessoas<i class="material-icons right">arrow_drop_down</i></a></li>
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
        <li><a href="/ajude">Faça sua doação</a></li>       
        <li><a href="/about">Sobre</a></li> 
    </ul>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h2>Faça sua doação</h2>
                <div class="card">
                    <div class="card-image">
                        <img src="/assets/imgs/qrcode.png">
                    <span class="card-title"></span>
                </div>
                <div class="card-content">
                    <p>
                        Diante da situação de calamidade pública enfrentada no Estado, 
                        o governo gaúcho ativou um canal de doações para a conta SOS Rio Grande do Sul. 
                        Foi restabelecida a chave Pix (CNPJ: 92.958.800/0001-38), 
                        a mesma utilizada no ano passado, 
                        vinculada à conta bancária aberta pelo Banrisul. 
                        As contribuições em dinheiro podem ser feitas por pessoas físicas 
                        e jurídicas que tenham condições de ajudar as vítimas das enchentes.
                    </p>

                    <p>
                        A gestão e fiscalização dos recursos ficarão a cargo de um Comitê Gestor, 
                        presidido pela Secretaria da Casa Civil e composto por representantes de 
                        órgãos do governo e entidades sociais. 
                        Os recursos serão integralmente revertidos para o apoio humanitário 
                        às vítimas das enchentes e para a reconstrução da infraestrutura das cidades.
                    </p>

                    <p>
                        Com o canal oficial de doações, o governo centraliza a ajuda financeira, 
                        fornece segurança aos doadores e amplia a transparência da alocação do dinheiro, 
                        uma vez que a movimentação dos recursos passará por auditoria e 
                        fiscalização do poder público.
                    </p>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                <span class="card-title">Doações Internacionais</span>
                
                <p>
                    O governo do Estado ativou canais de doação internacional 
                    para auxiliar as vítimas da catástrofe ambiental que atinge o Rio Grande do Sul. 
                    Com a ação, o Executivo amplia as possibilidades de arrecadação de fundos 
                    e permite que pessoas e organizações em todo o mundo contribuam para a 
                    situação de emergência.
                </p>
                <p>Para doar, utilize os seguintes dados e as instruções:</p>

                <div class="row">
                    <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s6"><a class="green-text text-darken-2" href="#euro">Zona do Euro</a></li>
                        <li class="tab col s6"><a class="green-text text-darken-2"  href="#dolar">Zona do dólar</a></li>
                    </ul>
                    </div>
                    <div id="euro" class="col s12">
                        <ul>
                            <li>Banco Standard Chartered</li>
                            <li>Bank Frankfurt</li>
                            <li>Swift: SCBLDEFX</li>
                            <li>Conta: 007358304</li>
                        </ul>
                    </div>
                    <div id="dolar" class="col s12">
                        <ul>
                            <li>Banco Standard Chartered</li>
                            <li>Bank New York</li>
                            <li>Swift: SCBLUS33</li>
                            <li>Conta: 3544032986001</li>
                        </ul>
                    </div>
                    
                </div>
                <p>Para ambos os casos, é preciso informar: </p>
                <ul>
                    <li>Código IBAN: BR5392702067001000645423206C1</li>
                    <li>Nome: Associação dos Bancos no Estado do Rio Grande do Sul</li>
                    <li>CNPJ: 92.958.800/0001-38</li>
                </ul>
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
<!-- Importando jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Importando Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="/assets/js/inits.js"></script>
<script src="/assets/js/functions.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('.tabs');
        M.Tabs.init(tabs);
    });

    $(document).ready(function(){
        $('.sidenav').sidenav();
    });

    $(".dropdown-trigger").dropdown();
</script>
</body>
</html>