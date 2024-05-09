let submitDoacao = document.getElementById("submitItens");
let submitLocal = document.getElementById("submitLocal");

submitDoacao.addEventListener('click', (e)=>{
    e.preventDefault();

    let nome  = document.getElementById("txt_nome").value;
    let quantidade = document.getElementById("txt_qtd").value;
    let selectTipo = document.getElementById("slc_tipo");
    let selectedOptionTipo = selectTipo.options[selectTipo.selectedIndex].value;

    console.log(nome, quantidade, selectedOptionTipo);
 

    fetch("/nova/doacao", {
        method: "POST",
        body: JSON.stringify({ select: selectedOptionTipo, nome, quantidade }),
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((response) => response.json())
        .then((data) => {
          alert("Itens cadastrados com sucesso");
        })
        .catch((error) => {
          console.error("Erro ao enviar dados para o servidor:", error);
    });

});

submitLocal.addEventListener('click', (e)=>{
  e.preventDefault();

  let nome  = document.getElementById("txt_nome_local").value;
  let logradouro = document.getElementById("txt_logradouro").value;
  let numero = document.getElementById("txt_numero").value;
  let bairro = document.getElementById("txt_bairro").value;
  let cidade = document.getElementById("txt_cidade").value;
  let uf = document.getElementById("txt_uf").value;
  let telefone = document.getElementById("txt_telefone").value;
  

  fetch("/novo/local-doacao", {
      method: "POST",
      body: JSON.stringify({ nome, logradouro, numero, bairro, cidade, uf,telefone }),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        window.location.reload();
        alert("Itens cadastrados com sucesso");
      })
      .catch((error) => {
        console.error("Erro ao enviar dados para o servidor:", error);
  });

});
