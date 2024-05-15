<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <title>SOS Enchente RS</title>
</head>
<body>
<ul id="drpDoacao" class="dropdown-content">
    <li><a href="/ver-doacoes">Doções necessárias</a></li>
    <li><a href="/ver-locais">Locais de doação</a></li>
</ul>
<ul id="drpAbrigos" class="dropdown-content">
    <li><a href="/ver-abrigos">Ver Abrigos</a></li>
    <li><a href="/ver-abrigos-pets">Ver Abrigos Pets</a></li>
</ul>
<ul id="drpPessoasPets" class="dropdown-content">
    <li><a href="/ver-pessoas">Pessoas</a></li>     
    <li><a href="/ver-pets">Pets</a></li>  
    <li><a href="/ver-desaparecidos">Desaparecidos</a></li>  
</ul>
<nav>
    <div class="nav-wrapper  green darken-1">
        <div class="row">
            <div class="col s8 m8 l12">
                <a href="/" class="brand-logo">SOS  Enchente RS</a>
                <a href="#" data-target="menu-mobile" class="sidenav-trigger">
                    <i class="material-icons">dehaze</i>
                </a>
            </div>
        
            <div class="col s8 l12">
                <ul class="right hide-on-med-and-down">
                    <li id="principal"><a href="/">Inicio</a></li>
                    <li  id="drDoacao"><a class="dropdown-trigger" href="#!" data-target="drpDoacao">Doações<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li id="drAbrigo"><a class="dropdown-trigger" href="#!" data-target="drpAbrigos">Abrigos<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li id="drPessoa"><a class="dropdown-trigger" href="#!" data-target="drpPessoasPets">Pessoas/Pets<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li id="info"><a href="/info">Informações</a></li>
                    <li id="ajuda"><a href="/ajude">Faça sua doação</a></li>    
                    <li id="about"><a href="/about">Sobre</a></li>     
                    <li id="logout"><a href="/logout">Sair</a></li>     
                </ul>
            </div>
           
        
    </div>
</nav>
<ul class="sidenav" id="menu-mobile">
    <li id="principalmb"><a href="/">Inicio</a></li>
    <li id="itemmb"><a href="/ver-doacoes">Doações necessárias</a></li>
    <li id="localmb"><a href="/ver-locais">Locais de doação</a></li>
    <li id="abrigomb"><a href="/ver-abrigos"> Abrigos</a></li>     
    <li id="abrigopetmb"><a href="/ver-abrigos-pets">Abrigos Pets</a></li>
    <li id="pessoamb"><a href="/ver-pessoas">Pessoas</a></li>
    <li id="petmb"><a href="/ver-pets">Pets</a></li>
    <li id="desaparecidomb"><a href="/ver-desaparecidos">Desaparecidos</a></li>
    <li id="infomb"><a href="/info">Informações</a></li> 
    <li id="ajudamb"><a href="/ajude">Faça sua doação</a></li>       
    <li id=""><a href="/about">Sobre</a></li> 
  	<li id="logoutmb"><a href='/login'>Sair</a></li>
	
</ul>
<main>
    <?= $this->content() ?>
</main>		

<footer class="page-footer  green darken-1">
	<div class="container">
		<div class="row">
			<div class="col l12 s6">
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
				<div class="col s5 m6 l4">
					<small>
						Desenvolvido por Code Experts Sistemas &copy <?php echo date('Y'); ?>
					</small>
				</div>
				<div class="col s2 l4">
					<img src="/assets/imgs/rs.png" alt="Bandeira do RS" width="32" height="32">
				</div>
				<div class="col s5 m6 l4">
					<small>
						CNPJ 52.916.779/0001-93
					</small>
				</div>				
			</div>
		</div>
	</div>
</footer>
	
</body>
</html>