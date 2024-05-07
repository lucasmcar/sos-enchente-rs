<!DOCTYPE html>
<html>
  <head>
    <!--implementar css/js aqui-->
    <meta charset="UTF-8">
    <title>Bem vindo ao Oficina Conectada</title>
    <!-- Compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .divider:after,
      .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
      }
      .h-custom {
        height: calc(100% - 73px);
      }
      @media (max-width: 450px) {
        .h-custom {
          height: 100%;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Oficina Conectada</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/forgot">Esqueci a identificação</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Esqueceu seu número de identificação?</h1>

        <h3>1. O que é seu número de identificação</h3>
        <p>
            É um número gerado aleatóriamente no momento do seu cadastro.
        </p>
        <p>
            Ele é usado para ter acesso ao sistema e também fazer buscas e solicitações, 
            de novos serviços, orçamentos, etc.
        </p>
        <p>Seu número de identiticação é algo <b>intransferível e inalterável</b>.</p>
        <p>Eles são únicos, seja para você cliente ou seja para você dono de oficina</p>

        <h3>2. Esqueci meu número e agora?</h3>
        <p>Se você perdeu e deseja recuperar seu número de identificação, você precisará solicitar a recuperação do mesmo. 
        <p>Para recuperar, você precisará digitar seu e-mail no campo abaixo, e clicar em enviar.</p>
        <p>Assim que enviar, você receberá um e-mail para que seu e-mail seja validado.</p>
        <p>Após confirmar a validação, você receberá outro contendo seu número. Lembre-se sempre de anotar em algum lugar para que não esqueça.</p>

        <h3>Recupere seu número: </h3>
        <form id="frmRecuperar" action="/getBack" method="POST">
            <input type="hidden" name="id_cliente" value="">
            <div class="mb-3">
                <label for="txtNome" class="form-label">Email</label>
                <input type="email" name="nome" class="form-control" id="txtNome">
            </div>
            <div class="col-10">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Obtém o caminho da URL atual
            var path = window.location.pathname;

            // Seleciona a lista da navbar
            var navbarList = document.querySelector('.navbar-nav');

            // Seleciona todos os itens da lista da navbar
            var links = navbarList.querySelectorAll('.nav-item a');

            // Itera sobre os links da navbar
            links.forEach(function(link) {
                // Verifica se o atributo href do link corresponde ao caminho da URL atual
                if (link.getAttribute('href') === path) {
                    // Adiciona a classe 'active' ao link correspondente
                    link.classList.add('active');
                }
            });
        });

    </script>
</body>
</html>