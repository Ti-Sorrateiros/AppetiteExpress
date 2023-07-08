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

        //se caso não tenha uma sessão (como login por exemplo)
        if (empty($_SESSION)) {
            session_start();
        }

        //sem sessão de array de produtos, criar um array a esta sessão
       if(empty($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
       }

        //recebimento dos dados
        if (isset($_POST['id'])) {
            $id = $_POST['id'] - 1;
            $nomeProduto = $_POST['nome'];
            $descricao = $_POST['desc'];
            $img = $_POST['img'];
            $price = $_POST['price'];
            $qtd = 1;

            //enviar os dados para a função 
            addProductCart($id, $nomeProduto, $descricao, $img, $price, $qtd);
        }


        //adicionar dados recebidos ao carrinho
        function addProductCart($id, $nomeProduto, $descricao, $img, $price, $qtd)
        {

            if (empty($_SESSION['carrinho'][$id])) {
                //criar um array para cada produto
                $produto = array();

                //recebendo os dados e colocando em um array de produto
                array_push($produto, $id, $nomeProduto, $descricao, $img, $price, $qtd);

                //enviar para o array de sessão produtos os valores contido no array de carrinho
                array_push($_SESSION['carrinho'], $produto);

            } else {
               array_push($_SESSION['carrinho'][$id] ,[5] + 1);
            }

            //array para sessão de dados
            if (empty($_SESSION['dados'])) {
                $_SESSION['dados'] = array();
            }

            //guardar os dados do carrinho
            array_push($_SESSION['dados'], array(
                'id_produto' => $id,
                'nome_produto' => $nomeProduto,
                'img' => $price,
                'preco' => $img,
                'quantidade' => $qtd
            )
            );
        }

        
        
        // echo '<pre>';
        // print_r($_SESSION['carrinho'][3]);
        // echo '</pre>';
        
        // //soma de quantidade
        // echo '<pre>';
        // print_r($_SESSION['carrinho'][1]);
        // echo '</pre>';

        // //preco * qtd
        // echo '<pre>';
        // print_r($_SESSION['carrinho'][0][3] * 2);
        // echo '</pre>';




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
                        <img class="imgProd product-image" src="../controllers/products/<?= strip_tags($prod[4]) ?>"
                            width="50px" />
                    </div>
                    <!-- title -->
                    <p>
                    <h4 id="titleProd">
                        <?= strip_tags($prod[1]) ?>
                    </h4>
                    <!-- Descricao -->
                    <p>
                    <h4 id="titleProd">
                        <?= strip_tags($prod[2]) ?>
                    </h4>

                    <!-- Preco -->
                    </p>
                    <p id="product-price"><b> R$: </b>
                        <?= number_format(strip_tags($prod[3]), 2, ",", '.') ?>
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

                        </p>
                    </div>
                </div>

                <hr>
                <?php
            }

        }

        ?>
        <br>

    </div>
    </div>
    <script src="../js/menu.js" type="text/javascript"></script>
    <script src="..js/JQuery.js" type="text/javascript"></script>
    <script src="../js/confirmlogout.js"></script>

</body>

</html>