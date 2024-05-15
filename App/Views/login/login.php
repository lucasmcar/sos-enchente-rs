
<section>
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">
                <div class="card">
                    <div class="card-image">
                        <img class="responsive-img" src="/assets/imgs/hands.png">
                    </div>
                    <div class="card-content">
                        <h4>Sistema SOS - RS</h4>
                        <p>
                            Esse sistema foi idealizado para ajudar voluntários 
                            e responsáveis por abrigos que estão aconlhendo pessoas 
                            e animais que foram afetados pelas enchentes no RS. 
                            para maiores informações sobre como funciona, <a href="/about">clique aqui</a> 
                        </p>
                    </div>
                </div>
            </div>

            <div class="col s12 l6 m12">
                <div class="card">
                    <div class="card-content">
                        <h4>Acesso</h4>

                        <form method="post">
                            <div class="row">
                                <div class="input-field col s12 l12">
                                    <input id="txt_username" type="text" class="validate">
                                    <label for="txt_username">Usuário</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 l12">
                                    <input id="txt_senha" type="password" class="validate">
                                    <label for="txt_senha">Senha</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 l12">
                                    <select id="slc_user">
                                        <option value="" selected>Selecione...</option>
                                        <option value="1">Voluntário</option>
                                        <option value="2">Abrigo</option>
                                        <option value="3">Local de doação</option>
                                    </select>
                                    <label>Você é/Representa um:</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s6 l6">
                                    <button type="submit" class="btn" id="submitUserLogin">Acessar</button>
                                </div>
                                <div class="col s6 l8">
                                    <a href="">Não possui cadastro? Cadastre-se</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div id="modal-auth" class="modal">
    <div class="modal-content valign-wrapper center-align">
        <div id="preloader-auth" class="preloader-wrapper big active valign" style="display: none;">
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
    </div>
</div>

<!-- Importando jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Importando Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="/assets/js/inits.js"></script>
<script src="/assets/js/fetch.js"></script>
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
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, {});
});
</script>