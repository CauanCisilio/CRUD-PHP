<?php
    include("header.php");
    include("conexao.php");
?>
<div class="container mt-3">
    <div class="form-control bg-light">
        <h2 class="text-black">Produtos Cadastrados</h2>
        <input type="text" class="form-control w-50 p-1">
        <div class="mb-3"></div>
        <a href="buscaProduto.php" class=" w-50 form-control btn btn-primary p-1">Buscar</a>
    </div>
<table class="table">       
    <tr>
        <td class="bg-light">ID</td>
        <td class="bg-light">Descrição</td>
        <td class="bg-light">QUANTIDADE</td>
        <td class="bg-light">MARCA</td>
        <td class="bg-light">MODELO</td>
        <td class="bg-light">COR</td>
        <td class="bg-light">DISPOSITIVO</td>
        <td class="bg-light">GARANTIA</td>
        <td class="bg-light">TEMPO DE GARANTIA</td>
        <td class="bg-light">PREÇO</td>
        <td class="bg-light">EDIÇÃO</td>
        <td class="bg-light">EXCLUSÃO</td>
    </tr>
    <?php
        $sql = "SELECT id, descricao, cor, marca, modelo, quantidade, preco, tipo_dispositivo, garantia, tempo_garantia FROM produtos"; 

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
        <td><?php echo $dados['marca']; ?></td>
        <td><?php echo $dados['modelo']; ?></td> 
        <td><?php echo $dados['cor']; ?></td> 
        <td><?php echo $dados['tipo_dispositivo']; ?></td> 
        <td><?php echo $dados['garantia']; ?></td> 
        <td><?php echo $dados['tempo_garantia']; ?> mês</td> 
        <td>R$<?php echo $dados['preco']; ?></td>
        <td><a href="editaProduto.php?id=<?php echo $dados['id']; ?>">Editar</a></td>
        <td><a href="deletaProduto.php?id=<?php echo $dados['id']; ?>">Deletar</a></td>
    </tr>
    <?php
        }
    ?>
</table>
<?php
    // Fechar a conexão com o banco de dados quando terminar
    $conn->close();
?>