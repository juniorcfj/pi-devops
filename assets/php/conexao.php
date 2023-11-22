
<?php

// Verifica se a função conectarAoBanco já foi declarada antes de declará-la
if (!function_exists('conectarAoBanco')) {
   
    
function conectarAoBanco() {
    
    $conn = mysqli_connect('localhost', 'root', '', 'adocaopets');
   
    if (!$conn) {
        die('Erro de conexão: ' . mysqli_connect_error());
    }

    return $conn;

}
}

?>

