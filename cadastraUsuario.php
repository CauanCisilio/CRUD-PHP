<?php
    include("conexao.php");

    $email=$_POST['email'];
    $nome=$_POST['nome'];
    $sobrenome=$_POST['sobrenome'];
    $senha=$_POST['senha'];

    //echo "$descricaoProduto"."\n"."$quantidade"."\n"."$preco";
    $sql = "INSERT INTO usuarios (email, nome,sobrenome, senha) VALUES ('$email', '$nome','$sobrenome', '$senha')";
    
    //usando prepare para evitar injeções SQL
    $stmt = mysqli_prepare($conn, $sql);
   
    if(mysqli_stmt_execute($stmt)){
        include("header.php");
    }else{
        echo "Erro:".$sql."<br>".mysqli_error($conn);
    }
?>