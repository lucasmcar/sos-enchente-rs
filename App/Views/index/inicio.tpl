<div class="container">
    <div class="row hide-on-small-only">
        <div class="col s12">
            <h3>SOS - RS</h3>
            <p>
                    Devido as grandes enchentes que assolaram o RS, por conta do grande volume de chuva no final 
                    do mês de abril e ínicio de maio 
                    muita gente perdeu suas casas, entes queridos e muitos bens.
                </p>
                <p>
                    Essas pessoas hoje estão em abrigos e precisando constantemente de doações 
                    e quem quer doar sabem onde e/ou o que é mais urgente, mais necessário.
                </p>
                <p>
                    Com o intuito de ser mais uma ferramenta de apoio aos voluntários.
                    Ela visa  ser o ponto de encontro entre as pessoas que querem doar alimentos, 
                    roupas entre outros itens e gostariam de saber onde e o que estão precisando.

                    Também, se você estiver oferencendo abrigo ou conheça um lugar oficial do governo, 
                    que possua vaga ou local para recolher doações.
                </p>
                <p>
                    Todos os locais cadastrados serão revisados, para que não haja nenhum problema.
                </p>
                <p>
                    Esse sistema também ajuda a cadastrar pessoas desaparecidas.
                    Se essa pessoa estiver em algum abrigo registrado no sistema, impedirá o cadastro e 
                    mostrará um aviso indicando onde essa pessoa está
                </p>
                <ul class="collection">
                    <li class="collection-item avatar">
                        <img src="/assets/imgs/add-location.png" alt="" class="circle">
                        <span class="title">1. Local</span>
                        <p>Cadastre o local onde <br>
                            estão recebendo doações e pessoas desabrigadas
                        </p>
                    </li>
                    <li class="collection-item avatar">
                        <img src="/assets/imgs/solidarity.png" alt="" class="circle">
                        <span class="title">2. Doações e pessoas</span>
                        <p>Após cadastro do local, <br>
                            cadastre os itens necessários e as pessoas desabrigadas .
                        </p>
                    </li>
                    <li class="collection-item avatar">
                        <img src="/assets/imgs/missing.png" alt="" class="circle">
                        <span class="title">3 . Pessoas desaparecidas</span>
                        <p>Antes de cadastrar, <br>
                            o sistema fará uma busca dessas pessoas em abrigos, se encontrar, 
                            vai mostrar o local e endereço
                            onde essa pessoa está.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <h4 class="show-on-small hide-on-large-only">Menus de cadastro</h4>
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
                            Cadastrar os itens mais urgentes.
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

            <!--Card cadastro de pessoas e pets desaparecidos -->
            <!--<div class="col s6 m6">
                <div class="card green darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">Desaparecidos</span>
                        <p>
                            Cadastrar pessoas ou pets que podem estar desaparecidos.
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#mdlPessoaPetDesaparecido" class="btn modal-trigger green lighten-2">Cadastrar</a>
                    </div>
                </div>
            </div>-->
            <!--/Card cadastro  pessoas e pets-->
            
        </div>
    </div>


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
                            {% if not empty($selects) and not isset($selects["retorno"] ) %}
                                {% foreach $selects['selectTypes'] as $key => $value %}
                                    <option value="{{ $value['idtipo_doacao'] }}">{{ $value['nome'] }} </option>
                                {% endforeach; %}
                            {% else %}
                                <option value="">Sem valor encontrado</option>
                            {% endif; %}
                        </select>
                        <label>Tipo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="txt_qtd" name="quantidade" type="text" class="validate">
                        <label for="txt_qtd">Quantidade necessária:</label>
                    </div>
                    <div class="input-field col s6">
                        <select id="slc_local" name="local">
                            <option value="">Escolha</option>
                                {% if not empty($locais) && not isset($locais['retorno']) %}
                                    {% foreach $locais['locais'] as $key => $value %}
                                        <option value="{{ $value['idlocal_doacao'] }}">{{ $value['nome'] }}</option>
                                    {% endforeach; %}
                                {% else %}
                                    <option value="">Sem valor cadastrado</option>
                                {% endif; %}
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
    </div>

    <!-- Modal Abrigo -->
    <div id="mdlAbrigoPessoaPet" class="modal">
        <div class="modal-content">
            <h4>Cadastro de abrigos</h4>

            <form method="post" action="#">
                <div class="row">
                    <div class="input-field col s3">
                        <label>
                            <input name="opt_tipo" value="civil" type="radio" />
                            <span>Para Civil</span>
                        </label>
        
                    </div>
                    <div class="input-field col s3">
                        <label>
                            <input name="opt_tipo" value="pet" type="radio" />
                            <span>Para Pet</span>
                        </label>
                    </div>
                    <div class="input-field col s3">
                        <label>
                            <input name="opt_tipo" value="ambos" type="radio" />
                            <span>Ambos</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="txt_nome_abrigo" name="nome" type="text" class="validate">
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
                
                    <div class="input-field col s2">
                        <input id="txt_cidade_abrigo" name="cidade" type="text" class="validate">
                        <label for="txt_cidade_abrigo">Cidade:</label>
                    </div>
                    <div class="input-field col s2">
                        <input id="txt_uf_abrigo" name="uf" type="text" class="validate">
                        <label for="txt_uf_abrigo">UF:</label>
                  </div>
                  <div class="input-field col s4">
                        <input id="txt_telefone_abrigo" name="telefone" type="text" class="validate">
                        <label for="txt_telefone_abrigo">Telefone:</label>
                  </div>
                  <div class="input-field col s3">
                        <input id="txt_vagas_abrigo" name="vagas" type="text" class="validate">
                        <label for="txt_vagas_abrigo">Nº Vagas:</label>
                  </div>
                </div>
                <div class="row">
                  <button class="btn light-green darken-2" id="submitLocalAbrigo" type="button" name="">Cadastrar Abrigo
                    <i class="material-icons right">send</i>
                  </button>
                </div>
            </form>

            
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
    </div>

    <!-- Model cadastro pessoas ou pet -->
    <div id="mdlPessoaPet" class="modal">
        <div class="modal-content">
            <h4>Cadastro de pessoas ou pets</h4>
            
            <form method="POST" enctype="multipart/form-data" id="civilPet">
                <div class="row">
                    <div class="col s12 l12">
                    <img id="pessoaPreview" width="200" height="auto" src="#" class="responsive-img" style="display: none;">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 l6">
                        <input id="txt_nome_civil" name="nome_civil" type="text" class="validate">
                        <label for="txt_nome_civil">Nome Completo:</label>
                    </div>
                    <div class="input-field col s3 l2">
                        <input id="txt_idade_civil" name="idade_civil" type="text" class="validate">
                        <label for="txt_idade_civil">Idade:</label>
                    </div>
                    <div class="input-field col s3 l4">
                        <select id="slc_civil_pet" name="pet_civil">
                                <option value="">Selecione...</option>
                                <option value="Pet">Pet</option>
                                <option value="Civil">Civil</option>
                        </select>
                    </div>
                    <div class="row" id="hiddenFields" style="display: none;">
                        <div class="input-field col s6">
                            <input id="txt_raca" name="raca" type="text" class="validate">
                            <label for="txt_raca">Raça:</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="txt_especie" name="especie" type="text" class="validate">
                            <label for="txt_especie">Espécie:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 l6">
                            <select id="slc_local_civil_pet" name="local_pet_civil">
                                <option value="">Escolha</option>
                                {% if not empty($local) && not isset($local['retorno']) %}
                                    {% foreach $local['local_abrigo'] as $key =>$value %}
                                        <option value="{{ $value['idlocal_abrigo'] }}">{{ $value['nome'] }}</option>
                                    {% endforeach; %}
                                {% else %}
                                    <option value="">Sem abrigo disponível</option>
                                {% endif; %}
                                
                            </select>
                        </div>
                        <div class="input-field col s6 l6">
                            <textarea id="txt_area_info" name="area_info" class="materialize-textarea"></textarea>
                            <label for="txt_area_info">Info Adicional</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 l6">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Foto</span>
                                    <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <button class="btn light-green darken-2" id="submitCadastroCivil" type="submit" name="">Cadastrar Civil/Pet
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--modal sucesso-->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <h4>Sucesso!</h4>
            <p>Dados inseridos com sucesso.</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
    </div>

    <!--modal sucesso cadastro pet pessoa-->
    <div id="successModalPessoaPet" class="modal">
        <div class="modal-content">
            <h4>Sucesso!</h4>
            <p>Dados inseridos com sucesso.</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
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

      document.getElementById("slc_civil_pet").addEventListener("change", function(){
         var selected = this.value;

         // Verifica se o valor selecionado é '1', se sim, mostra os campos ocultos
        if (selected === 'Pet') {
          document.getElementById('hiddenFields').style.display = 'block';
        } else {
          // Se não, esconde os campos ocultos
          document.getElementById('hiddenFields').style.display = 'none';
        }

      })
    });

    function previewImage(event) {
        const preview = document.getElementById('pessoaPreview');
        let file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }


    </script>
