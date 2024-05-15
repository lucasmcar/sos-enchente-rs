
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
