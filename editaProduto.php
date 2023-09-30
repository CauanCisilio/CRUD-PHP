<?php
include("header.php");
include("conexao.php");

// Verifica se o ID do produto está presente na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta o banco de dados para obter os dados do produto com base no ID
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $select = mysqli_query($conn, $sql);

    if ($select) {
        $produto = mysqli_fetch_assoc($select);
        
        if ($produto) {
            // O ID do produto está disponível aqui, e você pode usá-lo no formulário de edição
            ?>
            <div class="container mt-3">
                <form action="atualizaProduto.php" method="post">
                    <h2>Atualização de Cadastro</h2>
                    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>"> <!-- Adicione um campo oculto com o ID do produto -->
                    <div class="mb-3 mt-3">
                        <label class="form-label">Descrição do produto:</label>
                        <input type="text" name="desc" class="form-control" value="<?php echo $produto['descricao']; ?>">
                    </div> 
                    <div class="mb-3 mt-3">
                        <label class="form-label">Quantidade:</label>
                        <input type="number" name="quantidade" class="form-control" value="<?php echo $produto['quantidade']; ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Modelo:</label>
                        <input type="text" name="modelo" class="form-control" value="<?php echo $produto['modelo']; ?>">
                    </div> 
                    <div class="mb-3 mt-3">
                        <label class="form-label">Marca:</label>
                        <input type="text" name="marca" class="form-control" value="<?php echo $produto['marca']; ?>">
                    </div> 
                    <div class="mb-3 mt-3">
                        <label class="form-label">Tempo de garantia</label>
                        <select type="text" name="tempoGarantia" class="form-control bg-light" value="<?php echo $produto['tempoGarantia']; ?>>
                            <option value="1">1 mes</option>
                            <option value="2">2 mes</option>
                            <option value="3">3 mes</option>
                            <option value="4">4 mes</option>
                            <option value="5">5 mes</option>
                            <option value="6">6 mes</option>
                        </select>
                    </div> 
                    <div class="mb-3 mt-3">
                        <label class="form-label">Selecione a cor do produto</label>
                        <select type="text" name="cor" class="form-control bg-light" value="<?php echo $produto['cor']; ?>>
                                <option value="azul">azul</option>
                                <option value="verde">verde</option>
                                <option value="amarelo">amarelo</option>
                                <option value="laranja">laranja</option>
                                <option value="marrom">marrom</option>
                                <option value="preto">preto</option>
                            </select>
                    </div> 
                    <div class="mb-3 mt-3">
                        <label class="form-label">Garantia</label>
                        <select type="text" name="garantia" class="form-control bg-light value="<?php echo $produto['garantia']; ?>">
                                <option value="true">sim</option>
                                <option value="false">não</option>
                        </select>
                    </div> 
                    <div class="mb-3 mt-3">
                        <label class="form-label">Aparelhos</label>
                        <select type="text" name="dispositivo" class="form-control bg-light value="<?php echo $produto['dispositivo']; ?>">
                                <option value="desktop">Desktop</option>
                                <option value="notbook">Notbook</option>
                                <option value="android">Android</option>
                                <option value="IOS">IOS</option>
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Preço:</label>
                        <input type="number" name="preco" class="form-control" value="<?php echo $produto['preco']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
            <?php
        } else {
            echo "Produto não encontrado.";
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($conn);
    }
} else {
    echo "ID do produto não especificado.";
}
?>
