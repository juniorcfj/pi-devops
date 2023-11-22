<?php
session_start();
require '../../assets/php/conexao.php';
require '../../assets/php/usuarioLogado.php';
$conn = conectarAoBanco();
$user = verificarUsuarioLogado();
?>

<?php
// Supondo que você já tenha iniciado a sessão e conectado ao banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_id = $_POST['pet_id'];

    if (isset($_POST['aprovar'])) {
        // Atualizar o campo aprovacaoAdmin para 'Aprovado' (ou o valor desejado) no banco de dados
        $update_sql = "UPDATE cadastropet SET aprovacaoAdmin = 1 WHERE id = ?";
    } elseif (isset($_POST['desaprovar'])) {
        // Atualizar o campo aprovacaoAdmin para 'Desaprovado' (ou o valor desejado) no banco de dados
        $update_sql = "DELETE FROM cadastropet WHERE aprovacaoAdmin = 0 AND id = ?";
    }

    $stmt = $conn->prepare($update_sql);

    if ($stmt === false) {
        die("Falha na preparação da declaração: " . $conn->error);
    }

    $stmt->bind_param("i", $pet_id);

    if ($stmt->execute()) {
        // Redirecionar de volta para a página do admin após a atualização
        header("Location: ../../views/admin/homeAdmin.php");
        exit();
    } else {
        echo "Erro ao aprovar/desaprovar o pet: " . $stmt->error;
    }

    $stmt->close();
}

// Certifique-se de fechar a conexão se não estiver usando PDO
$conn->close();
?>
