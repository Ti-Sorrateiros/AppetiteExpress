<?php
include('../../database/conn.php');
// session_start();


// if(empty($_SESSION['Status'])){
//     header('');
// }


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Carrinho </title>
</head>

<body>
    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li class="item-menu">
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
            <li class="item-menu ativo">
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
        <h1>Carrinho</h1>
        <?php

        //verificando se o codigo do produto não está vazio $cd
        if (isset($_GET['id'])) {
            $id_prod = $_GET['id'];
        }
        //se a sessão de carrinho não estiver preenchida
        else if (empty($_SESSION['carrinho'])) {
            //será criado uma sessão chamada carrinho para receber um vetor
            $_SESSION['carrinho'] = array();
        }
        //se a variavel $id_produto não estiver preenchida
        else if (empty($_SESSION['carrinho'][$id_prod])) {
            $_SESSION['carrinho'][$id_prod] = 1;
        }
        //caso contrario, se ela estiver setada, adicione novos produtos
        else if (isset($_SESSION['carrinho'][$id_prod])) {
            $_SESSION['carrinho'][$id_prod] += 1;
            include ('mostrarCarrinho.php');
        }
        //mostra carrinho vazio
        else {
            include ('mostrarCarrinho.php');
        }

        ?>

        <!-- exibindo o valor da variavel total da compra -->
        <div class="">
            <h1>Total: R$
                <?php include ('mostrarCarrinho.php'); echo number_format($total, 2, ',', '.'); ?>
            </h1>
        </div>

        <div class="">
            <button></button>
            <a href=""><button>Continuar Compra</button></a>
            <a href=""><button>Finalizar Compra</button></a>
        </div>
    </div>

    <!-- <div class="container2">
        <h1>Valor Estimado</h1>
        <span>R$ 0,00</span>
        <button>Adicionar Carrinho</button>
    </div> -->


    <script src="../js/menu.js" type="text/javascript"></script>
    <script src="../js/noRefresh.js" type="text/javascript"></script>
</body>

</html>