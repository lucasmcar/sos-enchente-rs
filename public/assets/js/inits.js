/**
 * Arquivo onde inicialização das variaveis deverão ser criadas
 */


/**
 * Inicializa váriaveis de inputs
 * @returns {}
 */
function initVarsLocaoDoacao(){

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

    return{
        submitDoacao,
        submitLocal
    }
}