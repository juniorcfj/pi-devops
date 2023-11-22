<?php
session_start();
require '../../assets/php/conexao.php';
require '../../assets/php/usuarioLogado.php';
$conn = conectarAoBanco();
$user = verificarUsuarioLogado();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../assets/js/script.js"></script>
    <link rel="stylesheet" href="../../assets/css/cadastroPet.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Cadastro de pet</title>
</head>
<body>
<header>
      <ul>
          <a href='../../views/autenticado/home.php'> <li>
          <img src='../../assets/imgs/Adote-um-Amor-2.svg' alt=''class='logo'>
          </li></a> 
          </ul>
          <div class='dropdown'> 
          <div class='perfil-img' style='display:flex; align-items:center; justify-content:center;'>      
    <li class='dropdown-btn'>Perfil</li>
    <svg xmlns='http://www.w3.org/2000/svg' style='width:10px; color:green;' viewBox='0 0 320 512'><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d='M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z'/ ></svg>
    </div>
    <ul class='dropdown-menu'>
    <a href='#'><li>Perfil</li></a>
    <a href='../../assets/php/logout.php'><li>Sair</li></a>
    </ul>
  </div> 
  </header>
    

    <form id="meuFormulario" action="../../assets/php/validaCadastroPet.php" method="post" onsubmit="return validarFormulario()" enctype="multipart/form-data">
    <h1>Cadastro de pet</h1>
    <div class="input-data">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
        <span class="error-message" id="nomeError"></span>
    </div>

    <div class="double-data">
        <div class="input-data">
            <label for="especie">Espécie</label>
            <select name="especie" id="especie">
                <option value="" selected disabled>Selecione a espécie</option>
                <option value="Cachorro">Cachorro</option>
                <option value="Gato">Gato</option>
            </select>
            <span class="error-message" id="especieError"></span>
        </div>

        <div class="input-data">
            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo">
                <option value="" selected disabled>Selecione o sexo</option>
                <option value="Macho">Macho</option>
                <option value="Fêmea">Fêmea</option>
            </select>
            <span class="error-message" id="sexoError"></span>
        </div>
    </div>

    <div class="double-data">
        <div class="input-data">
            <label for="idade">Idade</label>
            <select name="idade" id="idade">
                <option value="" selected disabled>Selecione a idade</option>
                <option value="Idoso">Idoso</option>
                <option value="Adulto">Adulto</option>
                <option value="Filhote">Filhote</option>
            </select>
            <span class="error-message" id="idadeError"></span>
        </div>

        <div class="input-data">
            <label for="porte">Porte</label>
            <select name="porte" id="porte">
                <option value="" selected disabled>Selecione o porte</option>
                <option value="Porte pequeno">Porte pequeno</option> 
                <option value="Porte médio">Porte médio</option>
                <option value="Porte grande">Porte grande</option>
            </select>
            <span class="error-message" id="porteError"></span>
        </div>
    </div>

    <div class="input-data">
        <label for="estado">Selecione um estado</label>
        <select name="estado" id="estado" onchange="selecionarEstado()">
            <option value="" selected disabled>Selecione um estado</option>
        </select>
        <!-- Campo oculto para armazenar o ID do estado -->
        <input type="hidden" id="estadoId" name="estadoId">
        <span class="error-message" id="estadoError"></span>
    </div>

    <div class="input-data">
        <label for="cidade">Selecione uma cidade</label>
        <select name="cidade" id="cidade" disabled>
            <option value="" selected disabled>Selecione uma cidade</option>
        </select>
        <span class="error-message" id="cidadeError"></span>
    </div>

    <!-- Adiciona o campo de upload de imagem -->
    <div class="input-data">
        <label for="foto">Foto do Pet</label>
        <input type="file" name="foto" id="foto">
        <span class="error-message" id="fotoError"></span>
    </div>

    <input type="submit" value="Cadastrar">
</form>

</body>
</html>
<script>
  const dropdownBtn = document.querySelector('.dropdown-btn');
const dropdownMenu = document.querySelector('.dropdown-menu');

dropdownBtn.addEventListener('click', () => {
  dropdownMenu.classList.toggle('show');
});

window.addEventListener('click', (event) => {
  if (!event.target.matches('.dropdown-btn') && !event.target.matches('.dropdown-menu')) {
    dropdownMenu.classList.remove('show');
  }
});


</script>