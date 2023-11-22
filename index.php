<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto integrador</title>
    <link rel="stylesheet" href="assets\css\index.css">
    <link rel="stylesheet" href="assets\css\pets.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <ul>
            <img src="" alt="">
            <li><a href="index.php" class='link-header'>Inicio</a></li>
            <li><a href="pets.php" class='link-header'>Quero adotar</a></li>
            <li><a href="parcerias.php" class='link-header'>Parcerias</a></li>
        </ul>
        <ul>
            <a href="views\public\login.php"><li class="cabecalho-login">Entrar</li></a>
            <a href="views\public\cadastro.php"><li class="cabecalho-cadastre">Cadastre-se</li></a>
        </ul>
    </header>
    <section class="first-section">
        <img src="assets\imgs\banner.svg" alt="">
        <div class="btn-adocao">
            <button  class="quero-adotar"><a href="pets.php" class="btn-quero-adotar">Quero adotar</a></button>
           <button class="divulgar-animal"><a href="views/public/cadastro.php" class="a-divulgar-animal">Quero divulgar um animal</a></button>
        </div>
    </section>

    <section class="pets-section">
    <div class="text-base">
    <h1>Novos peludos por aqui</h1>
    <p>Nosso site está cheio de doguinhos e gatinhos ansiosos por uma familia! Vem ver.</p>
    </div>
    
    </section>
    <section class="pets-cadastrados">
    <?php 
    require 'assets/php/petsIndex.php';
    listarPets(); ?>
    </section>
    <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="fecharModal()">&times;</span>
        <div id="modalContent"></div>
    </div>
</div>
</body>
</html>


<script>
    function abrirModal(nome, especie, sexo, idade, porte) {
        var modalContent = document.getElementById('modalContent');
        modalContent.innerHTML = '<p>Nome: ' + nome + '</p>' +
                                 '<p>Espécie: ' + especie + '</p>' +
                                 '<p>Sexo: ' + sexo + '</p>' +
                                 '<p>Idade: ' + idade + '</p>' +
                                 '<p>Porte: ' + porte + '</p>';

        var modal = document.getElementById('myModal');
        modal.style.display = 'block';
    }

    function fecharModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'none';
    }

    // Fechar o modal se clicar fora dele
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>