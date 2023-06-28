<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/RealizarPedido.css">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/GoogleFonts/GoogleFonts.css">
    <link rel="stylesheet" href="../../styles/content.css">
    <link rel="stylesheet" href="../../styles/cadastroProdutos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Cadastrar Produtos</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <h1>Cadastrar Produtos</h1>
            <form action="../../controllers/products/productController.php" method="post">
                <label>Nome do Produto<input type="text" name="nome" required></label>
                <label>Descrição <input type="text" name="descricao" required></label>
                <label>Preço <input type="text" name="preco" required></label>
                <label>Adicionais <input type="text" name="adicionais" required></label>
                <!-- <label>Imagem <input type="file" required></label> -->
                <button type="submit" name="createProduto">Cadastrar</button>
            </form>
        </div>

        <div class="desconto">
            <h1>Inserir Desconto</h1>
            <form action="../../controller/controllercadastro.php" method="post">
                <label>ID do Produto <input type="text" name="id_product" required></label>
                <label>Desconto<input type="text" name="desconto" required></label>
                <button type="submit">INSERIR DESCONTO</button>
            </form>
        </div>
    </div>




    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li class="item-menu ativo">
                <a href="cadastrarProdutos">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link"> CadastrarProdutos</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="pedidosFeitos">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link"> PedidosFeitos</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="usuarios">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link"> Usuarios</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="verprodutos">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link">VerProdutos</span>
                </a>
            </li>
        </ul>
    </nav>
    <script src="../../js/menu.js" type="text/javascript"></script>
    <script src="../../js/noRefresh.js" type="text/javascript"></script>
</body>

</html>