<?php
include('conexao.php');

$consultaNome = $_POST['user'];
$consultaSenha =  $_POST['password'];
    
$SQL = "SELECT email, senha FROM usuarios WHERE email = ? AND senha = ?";
$stmt = $conn->prepare($SQL);
$stmt->bind_param("ss", $consultaNome, $consultaSenha);
$stmt->execute();
$stmt->store_result();

if (!empty($consultaNome) && !empty($consultaSenha) && $stmt->num_rows > 0) {
    // Redirecionar para a página desejada
    header("Location: header.php");
    exit();
} elseif (empty($consultaNome) || empty($consultaSenha) || $stmt->num_rows <= 0) {
    echo "<script>alert('usuario não encontrado');</script>";
    include("login.html");
} else {
    echo "<script>alert('Usuário ou senha incorretos');</script>";
    header("Location: login.html");
    echo "<font color='red'>Parece que você não possui um cadastro efetue um cadastro para desfrutar de nossos produtos</font>";
    exit();
}
?>
