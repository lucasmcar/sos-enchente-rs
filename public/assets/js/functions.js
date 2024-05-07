let submitDoacao = document.getElementById("submitItens");

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
    



