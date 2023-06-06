<?php
include('../../database/conn.php')
    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/centralize.css">
    <link rel="stylesheet" href="../styles/Lvalidation.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="shortcut icon" href="../images/Hamburguer.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/GoogleFonts/GoogleFonts.css">
    <title>Login</title>
</head>

<body>
    <div class="container">

        <h1>Faça seu Login</h1>
        <h3>Informe um login válido</h3>
        <form method="post" action="../controllers/user/userController.php">
            <div class="form-control">
                <label>Email</label>
                <input type="email" id="email" name="email">
                <i class="img-success"><img src="../images/success-icon.svg" alt=""></i>
                <i class="img-error"><img src="../images/error-icon.svg" alt=""></i>
                <small id="msg-error">Error Message</small>
                <i class="img-alert"><img src="../images/alert-icon.svg" alt=""></i>
                <small id="msg-alert">Login não Encontrado</small>

                <label>Senha
              
                </label>
                <input type="password" id="password" name="password" />
                <i class="img-success"><img src="../images/success-icon.svg" alt=""></i>
                <i class="img-error"><img src="../images/error-icon.svg" alt=""></i>
                <small id="msg-error">Error Message</small>
                <i class="img-alert"><img src="../images/alert-icon.svg" alt=""></i>
                <small id="msg-alert">Login não Encontrado</small>
            </div>

            <button type="submit" onclick="" name="loginUser" class="center">ENTRAR</button>

            <p id="Cadastrar-se" class="center">Ainda não é cadastrado? <a href="cadastro" style="color:#a29df3;">Cadastre-se</a></p>

        </form>

        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <script src="../js/Lvalidation.js"></script>

</body>

</html>