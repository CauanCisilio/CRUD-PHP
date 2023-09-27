<?php
    $host = "localhost";
    $dataBase = "loja";
    $user = "root";
    $password = "";

    $conn = mysqli_connect($host,$user,$password,$dataBase);

    if(!$conn){
        die("erro ao conectar ao banco de dados" . mysqli_connect_error());
    }else{
        //echo "<font color='green'>conectado com sucesso</font>";
    }
?>