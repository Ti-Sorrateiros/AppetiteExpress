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
    <link rel="stylesheet" href="../styles/Listaproduto.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Carrinho </title>
</head>

<body>
<noscript><div align="center" style="background: black; color: yellow;"><br><br><h2>Para melhor experiência no nosso site precisamos do javascript <br><br> habilite o JavaScript em seu navegador!</h2><br><br><br></div><hr></noscript>
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
        //mais parte do carrinho
        include('../controllers/products/cartController.php');
    
        //se o carrinho tiver vazio mostre uma mensagem que está vazio
        if (count($_SESSION['carrinho']) == 0) {
            echo '<br><h3 title="carrinho vazio" >Carrinho Vazio <a title="clique para adicionar os produtos ao carrinho" href="produtos">Clique aqui para adicionar produtos ao carrinho </a></h3>';
        } else {
            echo '<br><a href="produtos" title="Clique para escolher mais produtos"><button>Escolher mais produtos</button></a><br>';
            echo '<br><a href="../controllers/products/pedidoController.php" title="Clique para Finalizar Compra"><button>Finalizar Compra</button></a><br>';
            foreach ($_SESSION['carrinho'] as $prod) {
                ?>

                <br>
                <div class="Prod1">
                    <!-- Imagem -->
                    <div>
                        <img class="imgProd product-image" src="../controllers/products/<?= strip_tags($prod[3]) ?>"
                            width="50px" />
                    </div>
                    <!-- title -->
                    <p>
                    <h4  id="titleProd">
                        <?= strip_tags($prod[1]) ?>
                    </h4>
                    <!-- Descricao -->
                    <p>
                    <h4 id="descProd">
                    <?= strip_tags($prod[2]) ?>
                    </h4>

                    <!-- Preco -->
                    </p>
                    <p id="product-price"><b> R$: </b>
                        <?= number_format(strip_tags($prod[4]), 2, ",", '.') ?>
                    </p>

                    <!-- Quantidade  -->
                    </p>
                    <p id="product-price"><b> Quantidade: </b>
                        <?= strip_tags($prod[5]) ?>
                    </p>
                    <hr>
                    <div>
                        <h2>Total: </h2>
                        <p>R$
                        <?= strip_tags($prod[6]) ?>
                        </p>
                    </div>
                    <button name="remover" onclick="removerProd(<?= strip_tags($prod[0]) ?>)">Remover Produto</button>
                </div>

                <hr>
                
                <?php
            }

        }

        ?>

        <div>
            <h1>Valor Total: R<?php print_r(array_sum(array_column($_SESSION['carrinho'], 6))); ?></h1>
        </div>
        <br>

    </div>
    </div>
    <script src="../js/menu.js" type="text/javascript"></script>
    <script async src="../js/JQuery.js" type="text/javascript"></script>
    <script src="../js/confirmlogout.js"></script>
    <script src="../js/confirmCart.js"></script>

</body>

</html>