<?php
    include("conexao.php");

    $descricaoProduto=$_POST['desc'];
    $quantidade=$_POST['quantidade'];
    $preco=$_POST['preco'];

    //echo "$descricaoProduto"."\n"."$quantidade"."\n"."$preco";

    $sql = "INSERT INTO produtos (descricao, quantidade, preco) VALUES ('$descricaoProduto', $quantidade, $preco)";
    
    //usando prepare para evitar injeções SQL
    $stmt = mysqli_prepare($conn, $sql);
   
    if(mysqli_stmt_execute($stmt)){
        echo "cadastrado com sucesso!";
    }else{
        echo "Erro:".$sql."<br>".mysqli_error($conn);
    }
?>