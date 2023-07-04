<?php
include('../../database/conn.php');

$readUser = $conn->prepare('SELECT * FROM produtos');
$readUser->execute();
$rowTable = $readUser->fetchAll();

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
    <link rel="stylesheet" href="../styles/ListaProduto.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../styles/adicionarCarrinho.scss">
    <title>Produtos</title>
</head>

<body>
    <script async src="../js/addCart2.js" type="text/javascript"></script>

    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li class="item-menu ativo">
                <a href="produtos">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link">Produtos</span>
                </a>
                </div>
            </li>

            <li class="item-menu">
                <a href="localizacao">
                    <span class="icon"><i class="bi bi-geo-alt-fill"></i></span>
                    <span class="txt-link">Localização</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="carrinho">
                    <span class="icon"><i class="bi bi-cart4"></i></span>
                    <span class="txt-link">Carrinho</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="pedido">
                    <span class="icon"><i class="bi bi-clipboard2-fill"></i></span>
                    <span class="txt-link">Seus Pedidos</span>
                </a>
                </div>
            </li>
            <li class="item-menu">
                <a href="logout">
                    <span class="icon"><i class="bi bi-door-closed-fill"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
                </div>
            </li>
            
        </ul>
    </nav>


    <div class="content">
        <div>
            <h1 id="Title">Faça aqui o seu Pedido</h1>
        </div>

        <h3 class="Sub-prod">Escolha seu Alimento</h3>
   
        <?php
        foreach ($rowTable as $linha) {
            echo '<div>';
            echo '<div id="selecionarProd" class="Prod1" onclick="escolherProduto1()"><img class="imgProd product-image" src="../controllers/products/' . $linha['path_imagem'] . '"</div>';
            echo '<p><h2 id="titleProd" class="product-title">' . $linha['nome'] . '</h2></p>';
            echo '<p><h4 id="descProd">' . $linha['descricao'] . '</h4>';
            echo '<p><div id="product-price" ><b> R$: </b>' . $linha['preco'] . '</div></p>';
            echo '<a href="carrinho.php?adicionar='.$linha['id'].'"> <img id="imgAdd" src="../images/adicionar-produto.png" alt=""></a>';
            echo '<br>';
            echo '</div>';
            echo '<br>';
        }
        ?>


    <!-- <div class="container2"> (  comentado )
        <h1>Valor Estimado</h1>
        <span>R$ 0,00</span>
        <button>Adicionar Carrinho</button>
    </div> -->


    <script src="../js/menu.js" type="text/javascript"></script>
    <script src="../js/noRefresh.js" type="text/javascript"></script>
    <!-- <script src="../js/pedido.js" type="text/javascript"></script> -->
    <!-- <script src="../js/addCart.js" type="text/javascript"></script> -->
    <!-- <script src="../js/addCart2.js" type="text/javascript"></script> -->
    <script src="../js/validateNumber.js" type="text/javascript"></script>

</body>

</html>