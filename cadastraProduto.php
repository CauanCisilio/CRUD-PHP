<?php
    include("conexao.php");

    $descricaoProduto=$_POST['desc'];
    $quantidade=$_POST['quantidade'];
    $preco=$_POST['preco'];
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $cor = $_POST['cor'];
    $tipoDisposititvo=$_POST['dispositivo'];
    $tempoGarantia=$_POST['tempoGarantia'];
    $garantia = $_POST['garantia'];

    //echo "$descricaoProduto"."\n"."$quantidade"."\n"."$preco";
    $sql = "INSERT INTO produtos (descricao,cor,marca,modelo,quantidade,preco,tipo_dispositivo,garantia,tempo_garantia) 
    VALUES ('$descricaoProduto','$cor','$marca','$modelo',$quantidade,$preco,'$tipoDisposititvo',$garantia,$tempoGarantia)";
    
    //usando prepare para evitar injeções SQL
    $stmt = mysqli_prepare($conn, $sql);
   
    if(mysqli_stmt_execute($stmt)){
        echo "cadastrado com sucesso!";
    }else{
        echo "Erro:".$sql."<br>".mysqli_error($conn);
    }
?>