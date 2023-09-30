<?php
    include("header.php");
    include("conexao.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        // Executa a consulta para excluir o item da lista
        $sql = "DELETE FROM produtos WHERE id = $id";
        $deleta = mysqli_query($conn, $sql);
    
        // Verifica se a consulta foi bem-sucedida
        if ($deleta) {
            echo "Item excluído do estoque!";
        } else {
            echo "Não foi possível seguir com a exclusão: " . mysqli_error($conn);
        }
    }
?>
