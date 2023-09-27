<?php
    include("header.php");
?>
<div class="container mt-3">
    <form action="cadastraProduto.php" method="post">
        <h2>Cadastro de produto</h2>
        <div class="mb-3 mt-3">
            <label class="form-label">Descrição do produto:</label>
            <input type="text" name="desc" class="form-control">
            
        </div> 
        <div class="mb-3 mt-3">
            <label class="form-label">Quantidade:</label>
            <input type="number" name ="quantidade" class="form-control">
            
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">preço</label>
            <input type="number" name="preco" class="form-control">
        </div>
        
            <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>