<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\indexPets.css">
    <script src="assets/js/script.js"></script>
    <link rel="stylesheet" href="assets\css\pets.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Encontre um amiguinho</title>
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
    <h1>Encontre seu novo amigo</h1>
    <form action="">
    <select name="especie" id="especie">
        <option value="" selected disabled>Todas espécies</option>
        <option value="Cachorro">Cachorro</option>
        <option value="Gato">Gato</option>
    </select>
    <select name="sexo" id="sexo">
        <option value="" selected disabled>Todos sexos</option>
        <option value="Macho">Macho</option>
        <option value="Fêmea">Fêmea</option>
    </select>
    <select name="porte" id="porte">
        <option value="" selected disabled>Todos portes</option>
        <option value="Porte pequeno">Porte pequeno</option> 
        <option value="Porte médio">Porte médio</option>
        <option value="Porte grande">Porte grande</option>
    </select>
            
    <select name="estado" id="estado" onchange="selecionarEstado()">
        <option value="" selected disabled>Todos estados</option>
    </select>
    <input type="hidden" id="estadoId" name="estadoId">
        <span class="error-message" id="estadoError"></span>
        
    <select name="cidade" id="cidade" disabled>
        <option value="" selected disabled>Todas cidades</option>
    </select>
        <input type="submit" value="Buscar">
    </form>
    <?php 
    require 'assets/php/listaPets.php';
    buscarAnimais(); ?>
    
    <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="fecharModal()">&times;</span>
        <div id="modalContent"></div>
    </div>
</div>



</body>
</html>

</body>
</html>
<script>
    function abrirModal(nome, especie, sexo, idade, porte, whatsapp) {
        var modalContent = document.getElementById('modalContent');
        modalContent.innerHTML = '<p>Nome: ' + nome + '</p>' +
                                 '<p>Espécie: ' + especie + '</p>' +
                                 '<p>Sexo: ' + sexo + '</p>' +
                                 '<p>Idade: ' + idade + '</p>' +
                                 '<p>Porte: ' + porte + '</p>' +
                                 '<p>Telefone: ' + whatsapp + '</p>';

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