<?php

use function PHPSTORM_META\override;

    include("header.php");
?>
<body>
<div class="container mt-4 form-control">   
    <form action="loginUsuario.php" method="post">
    <p>Consumindo API com PHP</p>
        <h2>Login</h2>
        <div class="mb-3 mt-3">
            <label class="form-label">Email:</label>
            <input type="text" name="emailLogin" class="form-control">
            
        </div> 
        <div class="mb-3 mt-3">
            <label class="form-label">Senha:</label>
            <input type="password" name="senhaLogin" class="form-control">
        </div>
       
        
            <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
</body>
<?php
    include("conexao.php");
    @$emailLogin = $_POST['emailLogin'];
    @$senhaLogin = $_POST['senhaLogin'];

    $sql =  "SELECT email,senha FROM usuarios WHERE email = '$emailLogin' AND senha='$senhaLogin'";
    $stmt = mysqli_prepare($conn, $sql);
    $resultado = mysqli_query($conn, $sql);
    if($resultado && mysqli_num_rows($resultado) > 0){
        echo "<font color='blue'>Seja bem vindo!</font>";
    }
?>