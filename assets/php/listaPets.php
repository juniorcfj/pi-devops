<?php
require 'assets/php/conexao.php';
define('CAMINHO_IMAGENS', 'assets\imgs');

function buscarAnimais() {
    
    $conn = conectarAoBanco();
    // Inicializa as variáveis de busca
    $especie = isset($_GET['especie']) ? $_GET['especie'] : '';
    $sexo = isset($_GET['sexo']) ? $_GET['sexo'] : '';
    $porte = isset($_GET['porte']) ? $_GET['porte'] : '';
    $estado = isset($_GET['estado']) ? $_GET['estado'] : '';
    $cidade = isset($_GET['cidade']) ? $_GET['cidade'] : '';

    
    $sql = "SELECT cp.foto, cp.nome, cp.especie,cp.estado, cp.cidade, cp.sexo, cp.idade, cp.porte, c.whatsapp FROM cadastropet cp  left join cadastro c ON cp.dono = c.id WHERE adotado = false and aprovacaoAdmin = 1 and 1";

    if (!empty($especie)) {
        $sql .= " AND especie = '$especie'";
    }

    if (!empty($sexo)) {
        $sql .= " AND sexo = '$sexo'";
    }

    if (!empty($porte)) {
        $sql .= " AND porte = '$porte'";
    }

    if (!empty($estado)) {
        $sql .= " AND estado = '$estado'";
    }

    if (!empty($cidade)) {
        $sql .= " AND cidade = '$cidade'";
    }

    
    $result = $conn->query($sql);

    
   
    if ($result->num_rows > 0) {
        echo '<ul class="ul-pet">';

        while ($row = $result->fetch_assoc()) {
            echo '<li class="li-pet">';
            
           
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
else{

    echo"<h1 style='font-size:20px;'>Não encontramos nenhum bichinho. Tente diferentes buscas até encontrar um peludo pra chamar de seu. :)</h1>";
}
    // Fecha a conexão com o banco de dados
    $conn->close();
}


?>
