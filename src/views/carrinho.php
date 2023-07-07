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
    <script src="..js/JQuery.js" type="text/javascript"></script>
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
                <a id="logout">
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


        if (empty($_SESSION)) {
            session_start();
        }

        if (!$_SESSION['produtos']) {
            $_SESSION['produtos'] = array();
        }

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $nomeProduto = $_POST['nome'];
            $descricao = $_POST['desc'];
            $img = $_POST['img'];
            $price = $_POST['price'];
            $qtd = 1;

            
                $produto = array();

                array_push($produto, $id, $nomeProduto, $descricao, $img, $price, $qtd);

                array_push($_SESSION['produtos'], $produto);
            }

        // echo '<pre>';
        // print_r($_SESSION['produtos']);
        // echo '</pre>';
        

        foreach ($_SESSION['produtos'] as $prod) {

            echo '<pre>';
            print_r($prod);
            echo '</pre>';

            ?>

            <div class="Prod1">
                <img class="imgProd product-image" src="../controllers/products/<?= strip_tags($prod[2]) ?>" width="50px" />
                <p>
                </p>
                <p>
                <h4 id="descProd">
                    <?= strip_tags($prod[1]) ?>
                </h4>
                </p>
                <p>
                <div id="product-price"><b> R$: </b>
                    <?= strip_tags($prod[3]) ?>
                </div>
                </p>
            </div>
            <?php
        }

        ?>


        <div class="">
            <a href="produtos"><button>Continuar Compra</button></a>
            <a href=""><button>Finalizar Compra</button></a>
        </div>

    </div>

    <!-- exibindo o valor da variavel total da compra -->
    <!-- <div class="">
        <h1>Total: R$

        </h1>
    </div> -->


    </div>
    <script src="../js/menu.js" type="text/javascript"></script>
    <script src="../js/confirmlogout.js"></script>

</body>

</html>