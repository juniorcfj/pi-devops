<?php
session_start();

// Defina a constante para o caminho base do diretório de imagens
define('CAMINHO_IMAGENS', 'assets\imgs');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Pets</title>
    <style>
        /* Adicione aqui os estilos do seu modal */
        #myModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
            padding-top: 60px;
        }

        .modal-content {
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            background-color: #fefefe;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
function listarPets()
{
    require 'assets/php/conexao.php';

    $conn = conectarAoBanco();
    
    $sql = "SELECT cp.foto, cp.nome, cp.especie,cp.estado, cp.cidade, cp.sexo, cp.idade, cp.porte, c.whatsapp FROM cadastropet cp  left join cadastro c ON cp.dono = c.id WHERE adotado = false and aprovacaoAdmin = 1 ORDER BY cp.id desc limit 8";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<ul class="ul-pet">';

        while ($row = $result->fetch_assoc()) {
            echo '<li class="li-pet">';
            
            // Construa o caminho completo usando a constante CAMINHO_IMAGENS
            $caminhoImagem = CAMINHO_IMAGENS . '/' . $row['foto'];
            echo '<img src="' . $caminhoImagem . '"><br>';
            
            echo '<div class="dados-pet nome-pet-titulo"><p class="nome-pet"> ' . $row['nome'] . '</p></div>';
            echo'<div class="container-localizacao">';
            echo '<div class="dados-pet"><p> ' . $row['estado'] .', '. '</p></div>';
            echo '<div class="dados-pet"><p>' . $row['cidade'] . '</p></div>';
            echo "</div>";
            echo '<a target="_blank" href="https://wa.me/55' . $row['whatsapp'] . '?text=Olá%20O ' . $row['nome'] . '%20ainda%20está%20disponível%20para%20adoção?">WhatsApp</a>';

            
            // Adicione um botão que, quando clicado, abrirá um modal
            echo '<button class="informacoes-pet" onclick="abrirModal(\'' . $row['nome'] . '\', \'' . $row['especie'] . '\', \'' . $row['sexo'] . '\', \'' . $row['idade'] . '\', \'' . $row['porte'] . '\', \'' . $row['whatsapp'] . '\')">Ver Detalhes</button>';
            
            echo '</li>';
        }

        echo '</ul>';
    } 

    $conn->close();
}
?>

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="fecharModal()">&times;</span>
        <div id="modalContent"></div>
    </div>
</div>

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

</body>
</html>
