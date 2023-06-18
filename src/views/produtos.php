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
    <title>Produtos</title>
</head>

<body>
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
                <a href="descontos">
                    <span class="icon"><i class="bi bi-tag-fill"></i></span>
                    <span class="txt-link">Descontos</span>
                </a>
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
        </ul>
    </nav>


    <div class="content">
        <div>
            <h1>Faça aqui o seu Pedido</h1>
        </div>

        <h3 class="Sub-prod">Escolha seu Alimento</h3>
        <div id="selecionarProd" class="Prod1" onclick="escolherProduto1()">
            <img src="../images/products/Hamcheddar.jpg" alt="">
            <h4>Hamburguer de Chedder</h4>
            <p>Pao,Carne Caseira,Chedder,Bacon</p>
            <p><strong>R$ 20,00</strong></p>
        </div>

        <div id="selecionarProd1" class="Prod1" onclick="escolherProduto2()">
           <img src="../images/products/Hamcheddar.jpg" alt="">
            <h4>Hamburguer de Chedder</h4>
            <p>Pao,Carne Caseira,Chedder,Bacon</p>
            <p><strong>R$ 20,00</strong></p>
        </div>

        <h3 class="Sub-prod">Escolha sua Bebida</h3>
        <div id="selecionarBebi" class="Prod1" onclick="escolherBebida1()">
            <img src="../images/products/cocacola.png" alt="">
            <h4>Coca-Cola</h4>
            <p>zero,latinha,2 litros,3 litros</p>
            <p><strong>R$ 20,00</strong></p>
        </div>

        <div id="selecionarBebi1" class="Prod1" onclick="escolherBebida2()">
           <img src="../images/products/cocacola.png" alt="">
            <h4>Hamburguer de Chedder</h4>
            <p>Pao,Carne Caseira,Chedder,Bacon</p>
            <p><strong>R$ 20,00</strong></p>
        </div>
        <div class="botaoFinalizar" onclick="finalizarPedido()">
            Finalizar Pedido
        </div>


         <!--<?php
            $items = array
            (
                ['imagem' => '../images/products/hamburguer.jpg', 'preco' => '200'],
                ['imagem' => '../images/products/pizza.jpg', 'preco' => '100'],
                ['nome' => 'Curso 3', 'preco' => '400']
            );

            foreach ($items as $key => $value) {
                ?>
                <div class="produto">
                    <img src="<?php echo $value['imagem'] ?>">
                    <a href="?adicionar=<?php echo $key ?>">Adicionar ao carrinho!</a>
                </div>

                <?php
            }
            ?>
            <div></div>
            <?php
            if (isset($_GET['adicionar'])) {
                $idProduto = (int) $_GET['adicionar'];
                if (isset($items[$idProduto])) {
                    if (isset($_SESSION[$idProduto])) {
                        $_SESSION[$idProduto]['quantidade']++;
                    } else {
                        $_SESSION[$idProduto] = array('quantidade' => 1, 'nome' => $items[$idProduto]['nome'], 'preco' => $items[$idProduto]['preco']);
                    }
                    echo '<script>alert("o item foi adicionado ao carrinho");</script>';
                } else {
                    die('Você não pode adicionar um item que não existe.');
                }
            }
            ?>-->
        </div>



    <script src="../js/menu.js" type="text/javascript"></script>
    <script src="../js/noRefresh.js" type="text/javascript"></script>
    <script src="../js/pedido.js" type="text/javascript"></script>

</body>

</html>