<?php
include('../../database/conn.php');
$tabela = $conn->prepare("SELECT * FROM localizacao;");

include('../controllers/user/protected.php');

$tabela = $conn->prepare("SELECT * FROM localizacao");

$tabela->execute();
$rowTabela = $tabela->fetchAll();
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
<noscript><div align="center" style="background: black; color: yellow;"><br><br><h2>Para melhor experiência no nosso site precisamos do javascript <br><br> habilite o JavaScript em seu navegador!</h2><br><br><br></div><hr></noscript>
    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li title="Página de produtos" class="item-menu">
                <a href="produtos">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link">Produtos</span>
                </a>
                </div>
            </li>

            <li title="Página de localização" class="item-menu ativo">
                <a href="localizacao">
                    <span class="icon"><i class="bi bi-geo-alt-fill"></i></span>
                    <span class="txt-link">Localização</span>
                </a>
            </li>
            <li title="Página de carrinho" class="item-menu">
                <a href="carrinho">
                    <span class="icon"><i class="bi bi-cart4"></i></span>
                    <span class="txt-link">Carrinho</span>
                </a>
            </li>
            <li title="página de pedidos" class="item-menu">
                <a href="pedido">
                    <span class="icon"><i class="bi bi-clipboard2-fill"></i></span>
                    <span class="txt-link">Seus Pedidos</span>
                </a>
                </div>
            </li>
            <li title="sair do sistema" class="item-menu">
                <a id="logout">
                    <span class="icon"><i class="bi bi-door-closed-fill"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="content">
        <div class="item-titulo">
            <h1>Endereço para Entrega</h1>
            <br>
            <br>
        </div>

        <a href="cadastroLocalizacao.php"> <button> Cadastrar novo Endereço </button></a>
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
                    echo "<p> " . $linha['rua'] . " , " . $linha['cep'] . "," . $linha['numero'] . " ," . $linha['bairro'] . " ," . $linha['estado'] . "</p>";
                    echo '<br>';
                    echo '<br>';
                    //botões
                    echo '<a href=editLocalizacao.php?id=' . $linha['id'] . ' class="btn btn-warning"><button> Editar </button></a>';
                    echo '<a href=../controllers/localizacaocontroller/delitcontroller.php?id=' . $linha['id'] . ' class="btn btn-danger"> <button> Excluir </button></a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </tbody>
        </table>
       </div>
        
    </div>

    <script src="../js/menu.js" type="text/javascript"></script>
    <script src="../js/endereco.js" type="text/javascript"></script>
    <script src="../js/confirmlogout.js"></script>
</body>


</html>