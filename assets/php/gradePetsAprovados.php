<?php
require '../../assets/php/conexao.php'; 
function gradePetsAprovacao(){
    $conn = conectarAoBanco();
    $sql = "SELECT * FROM cadastropet where aprovacaoAdmin = 1";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo"<h1 style='text-align:center; margin:20px;'> Lista de pets</h1>";
        echo "<table border='1'>
                <tr>
                    <th>Nome do Pet</th>
                    <th>Especie</th>
                    <th>Sexo</th>
                    <th>Idade</th>
                    <th>Porte</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Aprovação do Admin</th>
                    <th>Ação</th>
                </tr>";
    
        // Exibir dados de cada pet na grade
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['nome']}</td>
                    <td>{$row['especie']}</td>
                    <td>{$row['sexo']}</td>
                    <td>{$row['idade']}</td>
                    <td>{$row['porte']}</td>
                    <td>{$row['estado']}</td>
                    <td>{$row['cidade']}</td>
                    <td>{$row['aprovacaoAdmin']}</td>
                    <td>
                        <form method='post' action='../../assets/php/aprovar_pet.php'>
                            <input type='hidden' name='pet_id' value='{$row['id']}'>
                            <button type='submit' name='desaprovar' class='desaprovar'>Excluir</button>
                        </form>
                    </td>
                </tr>";
        }
    
        // Fechar a tabela
        echo "</table>";
    } else {
        echo "<h1 style ='text-align:center; margin:20px;'>Nenhum pet encontrado.</h1>";
    }
}

?>