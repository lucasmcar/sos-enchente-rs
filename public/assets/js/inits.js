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

function initButons()
{
    let submitDoacao = document.getElementById("submitItens");
    let submitLocal = document.getElementById("submitLocal");
    let submitLocalAbrigo = document.getElementById("submitLocalAbrigo");

    return{
        submitDoacao,
        submitLocal,
        submitLocalAbrigo
    }
}