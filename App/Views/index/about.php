
<div class="container">
    <h4>Por que?</h4>
    <p>
        A ideia desse projeto foi pensada para ajudar a população do RS, população da Grande Porto Alegre
        que sofreu com as terriveis enchentes do final do mês de abril e ínicio de maio.
    </p>
    <p>
        Com a colaboraçao do meu amigo e também desenvolvedor Éberson, esperamos entregar esse projeto o quanto antes para 
        que mais pessoas tenham o acesso
    </p>
    <p>
        Como não poderia ajudar com dinheiro eu resolvi usar os meus conhecimentos com desenvolvimento de sistemas para desenvolver esse projeto de forma totalmente gratuita, 
        inclusive sua hospedagem, para que se possam registrar dados como:
        <ul>
            <li>O que estão precisando?</li>
            <li>Onde há abrigos e quantas vagas?</li>
            <li>Onde há postos para recolher doações?</li>
            <li>Encontrar familiares em abrigos de forma mais organizada</li>
        </ul>
    </p>
    <h4>Responsabilidades</h4>
    <p>
        Nos comprometemos em validar os cadastros, juntamente aos dados das prefeituras para que não haja 
        desinformação e assim, evitar colocar outras pessoas em perigo, que estão buscando ajudar 
        e também em busca de seus parentes.
        Contamos nesse momento com a colaboração de todas as pessoas interessadas em ajudar.
    </p>

    <h4>Que dados esse site coleta?</h4>
    <p>
        Esse site coleta apenas informações básicas sobre localização de abrigos, 
        pessoas e itens necessários para doação e pessoas desaparecidas.
    </p>
    <p>
        Nós não coletamos dados sensíveis como CPF, RG, email e outras informações consideradas sensíveis.
    </p>
    <p>
        Esse sistema também não coleta ou envia emails para seus usuários. 
    </p>
    <p>
        Nós apenas estamos oferencendo uma ferramente como forma de registro e pesquisa de informações
    </p>
    <p>
    Para qualquer dúvida, ou sugestão, por favor, enviar e-mail para <a href="mailto:codexpertssoftware@gmail.com">Code Experts</a>
    </p>
</div>


<!-- Importando jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Importando Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {
            edge: 'left'
        });
    });
    </script>
