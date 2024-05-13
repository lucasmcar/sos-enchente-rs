
let button = initButons();

//Valida se componentes existem na tela
//Se não existirem, as chamadas dos metodos não ocorrerão
if(button.submitDoacao != undefined){

  button.submitDoacao.addEventListener('click', (e)=>{
    e.preventDefault();

    let inputs = initVarsDoacao();

    const fetch = new Fetch("http://localhost:8000");

      fetch.post('/nova/doacao', { inputs }, {"Content-Type": "application/json",})
      .then( (data) => {
        if(data != undefined){
          var successModal = document.getElementById('successModal');
          var instance = M.Modal.init(successModal);
            instance.open();
            setTimeout(()=>{
              location.reload();
            },5000)
        }
      }).catch((error) => console.log(error))
  });

if(button.submitLocal != undefined){
    button.submitLocal.addEventListener('click', (e)=>{
      e.preventDefault();

      let inputs = initVarsLocalDoacao();

      const fetch = new Fetch("http://localhost:8000");

      fetch.post('/novo/local-doacao', { inputs }, {"Content-Type": "application/json",})
      .then( (data) => {
        var successModal = document.getElementById('successModal');
        var instance = M.Modal.init(successModal);
          instance.open();
          setTimeout(()=>{
            location.reload();
          },5000)
      })
      .catch((error) => console.log(error))
    });

  }

}

if(button.submitLocalAbrigo != undefined){

  button.submitLocalAbrigo.addEventListener('click', (e)=>{
    e.preventDefault();

    let inputs = initVarsLocalAbrigo();

    console.log(inputs.selected);

    const fetch = new Fetch("http://localhost:8000");

    fetch.post('/novo/abrigo', { inputs }, {"Content-Type": "application/json",})
      .then( (data) => {
        var successModal = document.getElementById('successModal');
        var instance = M.Modal.init(successModal);
          instance.open();
          setTimeout(()=>{
            location.reload();
          },5000)
      })
      .catch((error) => console.log(error))
  });

}

//Links ativos
document.addEventListener("DOMContentLoaded", function() {
  // Obtém o caminho da URL atual
  var path = window.location.pathname;

  // Seleciona a lista da navbar
  var navbarList = document.querySelector('.right');

  // Seleciona todos os itens da lista da navbar
  var links = navbarList.querySelectorAll('li');

  // Itera sobre os links da navbar
  links.forEach(function(link) {
      var href = link.querySelector('a').getAttribute('href');
      // Verifica se o atributo href do link corresponde ao caminho da URL atual
      if (href === path) {
          // Adiciona a classe 'active' ao link correspondente
          link.classList.add('active');
      }
  });
});

//Formatar telefone
let telefone = document.getElementById('txt_telefone');

if(telefone != undefined){
  telefone.addEventListener('keyup', (event)=>{
    // Get the input value and remove non-digit characters
    let input = event.target.value.replace(/\D/g, '');

    // Check if the input length is less than 11 characters
    if (input.length < 11) {
        // Apply the mask for phone numbers with 10 digits (e.g., (11) 91234-5678)
        input = input.replace(/^(\d{2})(\d{4,5})(\d{4})$/, '($1) $2-$3');
    } else {
        // Apply the mask for phone numbers with 11 digits (e.g., (11) 99123-4567)
        input = input.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
    }

    // Set the formatted value back to the input field
    event.target.value = input;
  });
}

let telefoneAbrigo = document.getElementById('txt_telefone_abrigo');
if(telefoneAbrigo != undefined){
  telefoneAbrigo.addEventListener('keyup', (event)=>{
    // Get the input value and remove non-digit characters
    let input = event.target.value.replace(/\D/g, '');

    // Check if the input length is less than 11 characters
    if (input.length < 11) {
        // Apply the mask for phone numbers with 10 digits (e.g., (11) 91234-5678)
        input = input.replace(/^(\d{2})(\d{4,5})(\d{4})$/, '($1) $2-$3');
    } else {
        // Apply the mask for phone numbers with 11 digits (e.g., (11) 99123-4567)
        input = input.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
    }

    // Set the formatted value back to the input field
    event.target.value = input;
  });
}
