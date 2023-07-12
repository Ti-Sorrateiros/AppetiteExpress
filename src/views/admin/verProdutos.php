<?php
include('../../../database/conn.php');
include('../../controllers/user/protectedAdmin.php');

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
    <title> Ver produtos </title>
</head>
<style>
    .content img {
        width: 100px;
        height: 100px;
    }
</style>

<body>
    <div class="content">
        <h1 class="center">Lista dos Produtos</h1>

        <div>

        </div>
        <?php
        foreach ($rowTable as $linha) {
            ?>
            <div>
                <p><img src="../../controllers/products/<?= strip_tags($linha['path_imagem']) ?>" />
                <p>
                <p><b> ID: </b>
                    <?= strip_tags($linha['id']) ?>
                </p>
                <p><b> Produto: </b>
                    <?= strip_tags($linha['nome']) ?>
                </p>
                <p><b> Descrição: </b>
                    <?= strip_tags($linha['descricao']) ?>
                    </h4>
                <p><b> Adicionais: </b>
                    <?= strip_tags($linha['adicionais']) ?>
                    </h4>
                <p><b> Preço: </b>
                    <?= strip_tags($linha['preco']) ?>
                </p>
                <a href="./formEdit/editarProduto.php?id=<?= strip_tags($linha['id']) ?>"><button
                        class="editar">Editar</button></a>
                <button onclick="deleteProd(<?= strip_tags($linha['id']) ?>)" class="excluir">Excluir</button>
            </div>
            <br>
            <hr>
            <?php
        }
        ?>
    </div>
 

    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li title="cadastrar produtos" class="item-menu">
                <a href="cadastrarProdutos">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link"> CadastrarProdutos</span>
                </a>
            </li>
            <li title="Relatórios dos pedidos feitos" class="item-menu">
                <a href="pedidosFeitos">
                    <span class="icon"><i class="bi bi-bag-check-fill"></i></span>
                    <span class="txt-link"> PedidosFeitos</span>
                </a>
            </li>
            <li title="ver usuarios" class="item-menu">
                <a href="usuarios">
                    <span class="icon"><i class="bi bi-person-circle"></i></span>
                    <span class="txt-link"> Usuarios</span>
                </a>
            </li>
            <li title="Lista dos Produtos cadastrados" class="item-menu ativo">
                <a>
                    <span class="icon"><i class="bi bi-eye-fill"></i></span>
                    <span class="txt-link">VerProdutos</span>
                </a>
            </li>
        </ul>
    </nav>

    <script src="../../js/menu.js" type="text/javascript"></script>
    <script src="../../js/confirmDelete.js" type="text/javascript"></script>
 
</body>

</html>