<?php
session_start();
require '../../assets/php/idUserLogado.php';
$user = verificarUsuarioLogado();
define('CAMINHO_IMAGENS', '../../assets/imgs');
function listarPets()
{
    require '../../assets/php/conexao.php';
    $conn = conectarAoBanco();
    $user = verificarUsuarioLogado();
    $sql = "SELECT * FROM cadastropet WHERE dono = $user and adotado = false and aprovacaoAdmin = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<ul class="ul-pet">';

        while ($row = $result->fetch_assoc()) {
            $caminhoImagem = CAMINHO_IMAGENS . '/' . $row['foto'];
            echo '<li class="li-pet">';
            echo '<img src="' . $caminhoImagem . '"><br>';
            echo '<div class="dados-pet"><p> Pet: ' . $row['nome'] . '</p></div>';
            echo '<div class="dados-pet"><p>Espécie: ' . $row['especie'] . '</p></div>';
            echo '<div class="dados-pet"><p>Sexo: ' . $row['sexo'] . '</p></div>';
            echo '<div class="dados-pet"><p>Idade: ' . $row['idade'] . '</p></div>';
            echo '<div class="dados-pet"><p>Porte: ' . $row['porte'] . '</p></div>';
            echo '<div class="dados-pet"><p>Adotado: ' . ($row['adotado'] ? 'Sim' : 'Não') . '</p></div>';

            
            // Adiciona um formulário para exclusão
            echo '<div class="btn-actions">';
            echo '<form action="../../assets/php/excluirPet.php" method="post">';
            echo '<input type="hidden" name="pet_id" value="' . $row['id'] . '">';
            echo '<input type="submit" value="Excluir Pet" class="excluir-pet">';
            echo '</form>';
            echo '<form action="../../assets/php/adotarPet.php" method="post">';
            echo '<input type="hidden" name="pet_id" value="' . $row['id'] . '">';
            echo '<input type="submit" value="Adotar Pet" class="adotar-pet">';
            echo '</form>';
            echo '</div>';
            echo '</li>';
        }

        echo '</ul>';
    } else {
        echo 'Nenhum pet cadastrado.';
    }

    $conn->close();
}

?>