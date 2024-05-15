/**
 * Arquivo onde inicialização das variaveis deverão ser criadas
 */


/**
 * Inicializa váriaveis de inputs
 * @returns {}
 */
function initVarsLocalDoacao(){

    let nome  = document.getElementById("txt_nome_local").value;
    let logradouro = document.getElementById("txt_logradouro").value;
    let numero = document.getElementById("txt_numero").value;
    let bairro = document.getElementById("txt_bairro").value;
    let cidade = document.getElementById("txt_cidade").value;
    let uf = document.getElementById("txt_uf").value;
    let telefone = document.getElementById("txt_telefone").value;
    
  return {
      nome,
      logradouro,
      numero,
      bairro,
      cidade,
      uf,
      telefone,
  }
}

function initVarsLocalAbrigo(){

  let nome  = document.getElementById("txt_nome_abrigo").value;
  let logradouro = document.getElementById("txt_logradouro_abrigo").value;
  let numero = document.getElementById("txt_numero_abrigo").value;
  let bairro = document.getElementById("txt_bairro_abrigo").value;
  let cidade = document.getElementById("txt_cidade_abrigo").value;
  let uf = document.getElementById("txt_uf_abrigo").value;
  let tipo = document.getElementsByName("tipo");
  let vaga = document.getElementById("txt_vagas_abrigo").value;
  let telefone = document.getElementById("txt_telefone_abrigo").value;
  

  selected = "";
  for(var i = 0; i <= tipo.length; i++){
    selected = tipo[i].checked ? tipo[i].value : "";
  }
 
  
  return {
      nome,
      logradouro,
      numero,
      bairro,
      cidade,
      uf,
      selected,
      vaga,
      telefone,
  }
}

function initVarsUserLogin()
{
  let usuario  = document.getElementById("txt_username").value;
  let senha  = document.getElementById("txt_senha").value;
  let slcTipo  = document.getElementById("slc_user");
  let slcUser = slcTipo.options[slcTipo.selectedIndex].value;

  return{
    usuario,
    senha,
    slcUser
  }

}

function initVarsDoacao(){

  let nome  = document.getElementById("txt_nome").value;
  let quantidade = document.getElementById("txt_qtd").value;
  let selectTipo = document.getElementById("slc_tipo");
  let selectLocal = document.getElementById("slc_local");
  let selectedOptionLocal = selectLocal.options[selectLocal.selectedIndex].value;
  let selectedOptionTipo = selectTipo.options[selectTipo.selectedIndex].value;

  return {
    nome,
    quantidade,
    selectLocal: selectedOptionLocal,
    select: selectedOptionTipo,
  }
}

function initVarsCivil()
{
    let nome = document.getElementById('txt_nome_civil').value;
    let idade = document.getElementById('txt_idade_civil').value;

    let local = document.getElementById('slc_local_civil_pet');
    let selectLocalCivilPet = local.options[local.selectedIndex].value;

    let selectCivilPet = document.getElementById("slc_civil_pet");
    let selectCP = selectCivilPet.options[selectCivilPet.selectedIndex].value;

    let info = document.getElementById('txt_area_info').value;
    let raca = document.getElementById('txt_raca').value;
    let especie = document.getElementById('txt_especie').value;
   
    especie != undefined ? especie : null;
    raca != undefined ? raca : null;

    return {
      nome,
      idade,
      selectLocalCivilPet,
      especie,
      raca,
      info,
      selectCP
    }

}

function initButons()
{
    let submitDoacao = document.getElementById("submitItens");
    let submitLocal = document.getElementById("submitLocal");
    let submitLocalAbrigo = document.getElementById("submitLocalAbrigo");
    let submitUserLogin = document.getElementById("submitUserLogin");
    let submitCadastroCilvil = document.getElementById("submitCadastroCivil");

    submitUserLogin != undefined ? submitUserLogin : null;

    return{
        submitDoacao,
        submitLocal,
        submitLocalAbrigo,
        submitUserLogin,
        submitCadastroCilvil
    }
}

function initVarCanvas(idCanvas)
{
    let ctx = document.getElementById(idCanvas);

    return { ctx }
}