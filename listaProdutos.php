<?php
    include("header.php");
    include("conexao.php");
?>
<div class="container mt-3">
    <div class="form-control bg-light">
        <h2 class="text-black">Produtos Cadastrados</h2>
        <input type="text" class="form-control w-50 p-1">
        <div class="mb-3"></div>
        <a href="buscaIndividualProdutos.php" class=" w-50 form-control btn btn-primary p-1">Buscar</a>
    </div>
<table class="table">       
    <tr>
        <td class="bg-light">ID</td>
        <td class="bg-light">Descrição</td>
        <td class="bg-light">QUANTIDADE</td>
        <td class="bg-light">PREÇO</td>
    </tr>
    <?php
        $sql = "SELECT id, descricao, quantidade, preco FROM produtos"; 
        // Executar a consulta
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
            die("Erro na consulta: " . $conn->error);
        }
        while($dados = mysqli_fetch_array($result)) { 
    ?>
    <tr>
        <td><?php echo $dados['id']; ?></td>
        <td><?php echo $dados['descricao']; ?></td>
        <td><?php echo $dados['quantidade']; ?></td>
        <td><?php echo $dados['preco']; ?></td>
    </tr>
    <?php
        }
    ?>
</table>
<?php
    // Fechar a conexão com o banco de dados quando terminar
    $conn->close();
?>