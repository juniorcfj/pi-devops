
<?php
session_start();

require '../../assets/php/conexao.php';
require '../../assets/php/idUserLogado.php';
$conn = conectarAoBanco();
$user = verificarUsuarioLogado();

// Função para validar e cadastrar os dados do pet
function cadastrarPet($dono, $nome, $especie, $sexo, $idade, $porte, $estado, $cidade, $adotado, $foto)
{
    $conn = conectarAoBanco();

    // Se uma imagem foi enviada, processe o upload
    if ($foto['error'] == UPLOAD_ERR_OK) {
        $fotoCaminho = salvarImagem($foto);
    } else {
        $fotoCaminho = null;
    }

   $sql = "INSERT INTO cadastropet (dono, nome, especie, sexo, idade, porte, estado, cidade, adotado, foto, aprovacaoAdmin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Falha na preparação da declaração: " . $conn->error);
}

// Converte o valor booleano para um valor inteiro (0 ou 1)
$adotado = $adotado ? 1 : 0;
$aprovacaoAdmin = 0;
// Define os parâmetros e executa a declaração
$stmt->bind_param("ssssssssisi", $dono, $nome, $especie, $sexo, $idade, $porte, $estado, $cidade, $adotado, $fotoCaminho,$aprovacaoAdmin );
    if ($stmt->execute()) {
        echo "<script>setTimeout(function(){window.location.href='../../views/autenticado/home.php';}, 3000);</script>";
        echo "<div class='success'>Obrigado por cadastrar seu pet na nossa plataforma!!</div>";
        echo "<div class='loader'></div>";
        echo "<div class='text'>Você será redirecionado para tela inicial!</div>";
    } else {
        echo "Erro ao cadastrar o pet: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Processa o formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $porte = $_POST['porte'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $adotado = false;

    // Verifica se foi enviado um arquivo
    if (isset($_FILES['foto'])) {
        $foto = $_FILES['foto'];
        cadastrarPet($user, $nome, $especie, $sexo, $idade, $porte, $estado, $cidade, $adotado, $foto);
    } else {
        // Lidar com o caso em que não foi enviado um arquivo
        echo "Erro: Nenhuma imagem enviada.";
    }
}

// Função para processar o upload de imagens
function salvarImagem($foto)
{
    $uploadDir = '../../assets/imgs/';
    $uploadFile = $uploadDir . basename($foto['name']);

    if (move_uploaded_file($foto['tmp_name'], $uploadFile)) {
        // A imagem foi carregada com sucesso, você pode salvar o caminho no banco de dados
        return $uploadFile;
    } else {
        echo 'Erro ao carregar a imagem.';
        return null;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Cadastro pet</title>

    <style>
        /* Seus estilos CSS aqui */
        .loader {
    border: 16px solid #f3f3f3;
    border-top: 16px solid #613387;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
    margin: 20px auto;
}


@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.success {
    font-size:30px;
    color: #613387;
    padding: 10px;
    margin: 20px 0;
    text-align: center;
    margin-top:200px;
    font-weight:600;
    font-family:Roboto;
}

.text{
    font-size:30px;
    color: #613387;
    padding: 10px;
    margin: 20px 0;
    text-align: center;
    margin-top:20px;
    font-weight:600;
    font-family:Roboto;
}

    </style>
</head>
<body>
</body>
</html>