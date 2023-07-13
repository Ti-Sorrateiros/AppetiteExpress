<?php
include('../../database/conn.php');
include('../controllers/user/protected.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/RealizarPedido.css">
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/GoogleFonts/GoogleFonts.css">
    <link rel="shortcut icon" href="../images/Hamburguer.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/content.css">
    <link rel="stylesheet" href="../styles/cadastroLocation.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <title>Localização </title>
</head>

<body>    
    <div class="form">
        <h1>Cadastre seu Endereço</h1>
        <form action="../controllers/localizacaocontroller/cadastroControllerDeEscolher.php" method="post"> 
            
            <div>
                <div>
                <label for="textCep">Cep</label>
                    <input id="txtCep" type="text" name="cep">
                </div>
            </div>

            <div>
                <div>
                <label for="textRua">Rua</label>
                    <input id="textRua" type="text" name="rua" required>
            </div>

            <div>
                <div>
                <label for="textNumero">Numero</label>                    
                    <input id="txtNumero" type="text" name="numero" required>
                </div>
            </div>

            <div>
                <div>
                <label for="txtBairro">Bairro</label>
                    <input id="textBairro" type="text" name="bairro" required >
                </div>
            </div>

            <div>
                <div>
                <label for="txtEstado">Estado</label>                    
                    <input id="textEstado" type="text" name="estado" required>
                </div>
            </div>       
            
        </form>
        <button type="submit" >Cadastrar</button> 
    </div>
    <button onclick="history.back()">Voltar</button>

    <script src="../js/menu.js" type="text/javascript"></script>
    <script src="../js/noRefresh.js" type="text/javascript"></script>
    <script src="../js/endereco.js" type="text/javascript"></script>
</body>
</html>


  