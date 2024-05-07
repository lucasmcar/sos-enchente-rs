<!DOCTYPE html>
<html>
    <head>
        <!--implementar css/js aqui-->
        <meta charset="UTF-8">
        <title>Bem vindo ao Oficina Conectada</title>
         <!-- Compiled and minified CSS -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-primary"" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Oficina Conectada</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Sobre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2>Contato</h2>

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    </body>
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