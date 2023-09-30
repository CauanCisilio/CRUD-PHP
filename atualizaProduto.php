<?php
    include("header.php");
    include("conexao.php");
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        echo "ID da URL: $id"; // Saída para verificar o ID da URL
        
        $descricao = mysqli_real_escape_string($conn, $_POST['desc']);
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];
        $marca = mysqli_real_escape_string($conn, $_POST['marca']);
        $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);

        //consulta SQL para atualizar o registro na tabela
        $sql = "UPDATE produtos SET 
        descricao = '$descricao', 
        quantidade = $quantidade, preco = $preco, marca = '$marca', modelo = '$modelo'
        WHERE id = $id";
        
        // Executa a consulta SQL
        $atualiza = mysqli_query($conn, $sql);
        
        // Verifica se a consulta foi bem-sucedida
        if ($atualiza) {
            echo "Itens Atualizados com sucesso!";
        } else {
            echo "Erro na atualização: " . mysqli_error($conn);
        }
    } else {
        echo "ID da URL não especificado.";
    }
?>
