<?php
    include("conexao.php");

    $email=$_POST['email'];
    $nome=$_POST['nome'];
    $senha=$_POST['senha'];

    //echo "$descricaoProduto"."\n"."$quantidade"."\n"."$preco";

    $sql = "INSERT INTO usuarios (email, nome, senha) VALUES ('$email', '$nome', '$senha')";
    
    //usando prepare para evitar injeções SQL
    $stmt = mysqli_prepare($conn, $sql);
   
    if(mysqli_stmt_execute($stmt)){
        echo "cadastrado com sucesso!";
    }else{
        echo "Erro:".$sql."<br>".mysqli_error($conn);
    }
?>