<?php
include('../../database/conn.php');
include('../controllers/user/protected.php');


//receber da parte do carrinho a sessão dos itens selecionados (já feito)

//pegar todos os endereços que o cliente cadastrou na tabela localização (select feito)

$tabela = $conn->prepare("SELECT * FROM localizacao where id_cliente = :id_cliente");

$tabela->execute(array(':id_cliente' => $_SESSION['id']));
$rowTabela = $tabela->fetchAll(PDO::FETCH_ASSOC);

//mostrar todas as localizações do usuario (feito)

//deixar selecionado a checkbox do endereço escolhido 

//permitir que o usuario crie outra checkbox para escolher outro endereço


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/content.css">
    <link rel="stylesheet" href="../styles/GoogleFonts/GoogleFonts.css">
    <link rel="shortcut icon" href="../images/Hamburguer.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/localizacao.scss">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Localização</title>
</head>

<body>
    <noscript>
        <div align="center" style="background: black; color: yellow;"><br><br>
            <h2>Para melhor experiência no nosso site precisamos do javascript <br><br> habilite o JavaScript em seu
                navegador!</h2><br><br><br>
        </div>
        <hr>
    </noscript>



    <div class="content">
        <div class="item-titulo">
            <h1>Escolher Endereço para Entrega</h1>
            <br>
            <br>
            <div>
                <a href="cadastroLocalizacao_escolher.php"> <button> Cadastrar novo Endereço </button></a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="container-wrap">
            <table>
                <tbody>
                    <?php

                    foreach ($rowTabela as $linha) {
                        echo '<div class="card">';
                        echo '<img class="card-image" src="../images/mapa.png" />';
                        //titulo
                        echo "<p class='card-title'>Casa</p>";
                        //informações
                        echo '<div class="card-body">';
                        echo "<p> " . $linha['rua'] . " , " .
                            $linha['cep'] . "," . $linha['numero'] . " ,"
                            . $linha['bairro'] . " ," .
                            $linha['estado'] . "</p>";
                        echo '<br>';
                        echo '<br>';
                        //botões
                        echo '<a href="../controllers/products/pedidoController.php?localizacao=' . $linha['id'] . '"><button title="selecionar endereço">  Selecionar este endereço </button></a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>


</html>