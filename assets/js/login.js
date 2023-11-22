function login() {
    var email = document.getElementsByName("email")[0].value;
    var senha = document.getElementsByName("senha")[0].value;
  
    if (email == "" || senha == "") {
      alert("Por favor, preencha todos os campos!");
      event.preventDefault();
    }
  }