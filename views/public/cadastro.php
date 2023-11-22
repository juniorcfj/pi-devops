<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <title>Cadastro</title>
</head>
<body>
<img src="../../assets/imgs/banner-login.png" alt="">
    <section class="login" >
        <h1>Novo usuário? Adicione suas informações</h1>
        <p>Para divulgar ou adotar um animalzinho, você precisa ter um cadastros</p>
        <form action="../../assets/php/validaCadastro.php" method="POST" name="seuForm" onsubmit="return validarFormulario()">

        <div class="input-data">
         <label for="email">Seu nome</label>
         <input type="text" placeholder="Digite seu nome" name="nome">
        </div>
        <div class="input-data">
         <label for="email">E-mail</label>
         <input type="text" placeholder="Digite seu e-mail" name="email">
        </div>
        <div class="input-data">
         <label for="email">Confirmação de e-mail</label>
         <input type="text" placeholder="Digite seu e-mail"  name="confirm-email">
        </div>
        <div class="input-data">
         <label for="email">WhatsApp</label>
         <input type="phone" placeholder="Digite seu numero de whatsApp" name="whatsapp">
        </div>
        <div class="input-data">
         <label for="email">Senha</label>
         <input type="password" placeholder="Digite sua senha" name="senha">
        </div>
        <div class="input-data">
         <label for="email">Confirme sua senha</label>
         <input type="password" placeholder="Digite sua senha" name="confirm-senha">
        </div>
        <input type="submit" value="Salvar" class="btn-entrar">
        </form>
    </section>
</body>
</html>

<script>
    function validarFormulario() {
        // Obtém os valores dos campos
        var nome = document.forms["seuForm"]["nome"].value;
        var email = document.forms["seuForm"]["email"].value;
        var confirmEmail = document.forms["seuForm"]["confirm-email"].value;
        var whatsapp = document.forms["seuForm"]["whatsapp"].value;
        var senha = document.forms["seuForm"]["senha"].value;
        var confirmSenha = document.forms["seuForm"]["confirm-senha"].value;

        // Realiza a validação
        if (nome == "" || email == "" || confirmEmail == "" || whatsapp == "" || senha == "" || confirmSenha == "") {
            alert("Por favor, preencha todos os campos.");
            return false; // Impede o envio do formulário se algum campo estiver vazio
        }

        if (email !== confirmEmail) {
            alert("Os campos de e-mail não coincidem.");
            return false;
        }

        if (senha !== confirmSenha) {
            alert("Os campos de senha não coincidem.");
            return false;
        }

        // Se todas as verificações passarem, o formulário será enviado
        return true;
    }
</script>