<?php
include("conexao.php");
include("header.php");

if(isset($_POST['busca'])) {
    $busca = $_POST['busca'];
    // Prevent SQL injection by using prepared statements
    $sql = "SELECT id, descricao,quantidade,preco,modelo,marca FROM produtos WHERE descricao LIKE ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . mysqli_error($conn));
    }

    // Bind the search term to the prepared statement
    $param = '%' . $busca . '%';
    mysqli_stmt_bind_param($stmt, "s", $param);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        // Check if any results were found
        if (mysqli_num_rows($result) > 0) {
?>
            <div class="container mt-3">
                <div class="form-control bg-light">
                    <h2 class="text-black">Produtos Encontrados</h2>
                    <form method="POST">
                        <input type="text" name="busca" class="form-control w-50 p-1">
                        <div class="mb-3"></div>
                        <button type="submit" class="w-50 form-control btn btn-primary p-1">Nova Busca</button>
                    </form>
                </div>
                <table class="table">       
                    <tr>
                        <td class="bg-light">ID</td>
                        <td class="bg-light">Descrição</td>
                        <td class="bg-light">MARCA</td>
                        <td class="bg-light">MODELO</td>
                        <td class="bg-light">QUANTIDADE</td>
                        <td class="bg-light">PREÇO</td>
                    </tr>
                    <?php
                    while($dados = mysqli_fetch_array($result)) { 
                    ?>
                    <tr>
                        <td><?php echo $dados['id']; ?></td>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['marca']; ?></td>
                        <td><?php echo $dados['modelo']; ?></td>
                        <td><?php echo $dados['quantidade']; ?></td>
                        <td>R$<?php echo $dados['preco']; ?></td>
                        <td><a href="editaProduto.php?id=<?php echo $dados['id']; ?>">Editar</a></td>
                        <td><a href="deletaProduto.php?id=<?php echo $dados['id']; ?>">Deletar</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
<?php
        } else {
            echo '<div class="container mt-3"><p>Nenhum produto encontrado.</p></div>';
        }
    } else {
        echo "Erro na execução da consulta: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    // If 'busca' is not set, display all products
    $sql = "SELECT id, descricao, quantidade, preco, marca,modelo FROM produtos";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }
?>
    <div class="container mt-3">
        <div class="form-control bg-light">
            <h2 class="text-black">Produtos Cadastrados</h2>
            <form method="POST">
                <input type="text" name="busca" class="form-control w-50 p-1">
                <div class="mb-3"></div>
                <button type="submit" class="w-50 form-control btn btn-primary p-1">Nova Busca</button>
            </form>
        </div>
        <table class="table">       
            <tr>
                <td class="bg-light">ID</td>
                <td class="bg-light">Descrição</td>
                <td class="bg-light">QUANTIDADE</td>
                <td class="bg-light">PREÇO</td>
            </tr>
            <?php
            while($dados = mysqli_fetch_array($result)) { 
            ?>
            <tr>
                <td><?php echo $dados['id']; ?></td>
                <td><?php echo $dados['descricao']; ?></td>
                <td><?php echo $dados['quantidade']; ?></td>
                <td>R$<?php echo $dados['preco']; ?></td>
                <td><a href="editaProduto.php?id=<?php echo $dados['id']; ?>">Editar</a></td>
                <td><a href="deletaProduto.php?id=<?php echo $dados['id']; ?>">Deletar</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
<?php
}
?>
