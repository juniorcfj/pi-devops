<?php
session_start();
require '../../assets/php/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o ID do pet foi fornecido
    if (isset($_POST['pet_id']) && !empty($_POST['pet_id'])) {
        $petId = $_POST['pet_id'];

        // Realiza a atualização no banco de dados
        $conn = conectarAoBanco();
        $sql = "UPDATE cadastropet SET adotado = true WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Falha na preparação da declaração: " . $conn->error);
        }

        // Define o parâmetro e executa a declaração
        $stmt->bind_param("i", $petId);

        if ($stmt->execute()) {
            // Atualização bem-sucedida
            echo "Pet adotado com sucesso!";
        } else {
            echo "Erro ao adotar o pet: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "ID do pet não fornecido.";
    }
} else {
    echo "Acesso inválido.";
}

// Redireciona de volta à página de listagem de pets após alguns segundos
header("Location:/../views/autenticado/meusPets.php");
?>
