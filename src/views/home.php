<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../styles/bootstrap/bootstrap@5.2.3.css"> -->
    <link rel="stylesheet" href="../styles/RealizarPedido.css">
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/GoogleFonts/GoogleFonts.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li class="item-menu ativo">
            <a onclick="openPage('produtos' , 'conteudo')">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link">Produtos</span>
                </a>
                </div>
            </li>
            <li class="item-menu">
            <a onclick="openPage('descontos' , 'conteudo')">
                    <span class="icon"><i class="bi bi-tag-fill"></i></span>
                    <span class="txt-link">Descontos</span>
                </a>
            </li>
            <li class="item-menu">
            <a onclick="openPage('localizacao' , 'conteudo')">
                    <span class="icon"><i class="bi bi-geo-alt-fill"></i></span>
                    <span class="txt-link">Localização</span>
                </a>
            </li>
            <li class="item-menu">
              <a onclick="openPage('carrinho' , 'conteudo')">
                    <span class="icon"><i class="bi bi-cart4"></i></span>
                    <span class="txt-link">Carrinho</span>
                </a>
            </li>
            <li class="item-menu">
            <a onclick="openPage('pedido' , 'conteudo')">
                    <span class="icon"><i class="bi bi-house"></i></span>
                    <span class="txt-link">Seus Pedidos</span>
                </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- conteudo das paginas que estão em content -->
    <section id="conteudo" align="center">
        <header>
            <?php include('content/produtos.php'); ?>
        </header>
    </section>

   

    <script src="../js/menu.js" type="text/javascript"></script>
    <script src="../js/noRefresh.js" type="text/javascript"></script>
</body>

</html>