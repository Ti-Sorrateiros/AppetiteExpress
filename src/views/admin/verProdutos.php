<?php
include('../../../database/conn.php');

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/centralize.css">
    <link rel="stylesheet" href="../../styles/table.css">
    <link rel="stylesheet" href="../../styles/content.css">
    <link rel="shortcut icon" href="../../images/Hamburguer.png" type="image/x-icon">
    <title>Usuarios </title>
</head>

<body>
    <div class="content">
        <h1 class="center">Lista dos Produtos</h1>
                    <?php
                    foreach ($rowTable as $linha) {
                        echo '<div>';
                        //imagem tem que retirada de um link do banco de dados
                        echo '<p><img src="../../controllers/products/'.$linha['path_imagem'].'." width="50px" /><p>';
                        echo '<p><b> ID: </b>' . $linha['id'] . '</p>' ;
                        echo '<p><b> Produto: </b>' . $linha['nome'] . '</p>';
                        echo '<p><b> Descrição: </b>' . $linha['descricao'] . '</h4>';
                        echo '<p><b> Preço: </b>' . $linha['preco'] . '</p>';
                        echo '<a href="./formEdit/editarProduto.php?id=' . $linha['id'] . '"><button class="editar">Editar</button></a>';
                        echo '<a href="../../controllers/products/productController.php?id="' . $linha['id'] . '"><button class="excluir">Excluir</button></a>';
                        echo '</div>';
                        echo '<br>';
                        echo '<hr>';
                    }
                    ?>
    </div>



    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li class="item-menu">
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
            <li class="item-menu ativo">
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