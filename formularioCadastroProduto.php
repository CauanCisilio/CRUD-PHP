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
            <label class="form-label">Modelo:</label>
            <input type="text" name="modelo" class="form-control">
            
        </div> 
        <div class="mb-3 mt-3">
            <label class="form-label">Marca:</label>
            <input type="text" name="marca" class="form-control">
            
        </div> 
        <div class="mb-3 mt-3">
            <label class="form-label">Tempo de garantia</label>
            <select type="text" name="tempoGarantia" class="form-control bg-light">
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
            <select type="text" name="cor" class="form-control bg-light">
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
            <select type="text" name="garantia" class="form-control bg-light">
                    <option value="true">sim</option>
                    <option value="false">não</option>
            </select>
        </div> 
        <div class="mb-3 mt-3">
            <label class="form-label">Aparelhos</label>
            <select type="text" name="dispositivo" class="form-control bg-light">
                    <option value="desktop">Desktop</option>
                    <option value="notbook">Notbook</option>
                    <option value="android">Android</option>
                    <option value="IOS">IOS</option>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">Quantidade:</label>
            <input type="number" name="quantidade"  class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Preço:</label>
            <input type="number" name="preco" placeholder="R$" class="form-control">
        </div>
        
            <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>