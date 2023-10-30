<?php
include('../../../database/conn.php');
include('../../controllers/user/protectedAdmin.php');

// $sql = $conn->prepare("SELECT  * as dia FROM  pedidos");
$sql = $conn->prepare("SELECT pedidos.id , pedidos.valor_total, usuarios.nome, usuarios.email , pedidos.dia, pedidos.hora
FROM usuarios
INNER JOIN pedidos 
on pedidos.id_cliente = usuarios.id;");

$sql->execute();
$rowTable = $sql->fetchAll(PDO::FETCH_ASSOC);


?>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../../images/Hamburguer.png" type="image/x-icon">
    <title>Relatório de pedidos </title>
</head>

<body>


    <div class="content">
        <br>
        <h1>Relatório dos pedidos Feitos</h1>
        <br>
    </div>


    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li title="cadastrar produtos" class="item-menu ">
                <a href="cadastrarProdutos">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link"> CadastrarProdutos</span>
                </a>
            </li>
            <li title="Relatórios dos pedidos feitos" class="item-menu ativo">
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
            <li title="Lista dos Produtos cadastrados" class="item-menu">
                <a href="verProdutos">
                    <span class="icon"><i class="bi bi-eye-fill"></i></span>
                    <span class="txt-link">VerProdutos</span>
                </a>
            </li>
            <li  title="sair do sistema"class="item-menu">
                <a id="logout">
                    <span class="icon"><i class="bi bi-door-closed-fill"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="content">
        <?php
        foreach ($rowTable as $pedidos) {
            echo '<div class="card" >';
            //titulo
            echo "<p class='card-title'> <b>Pedido N° " . $pedidos['id'] . "</b></p>";
            //informações
            echo '<div class="card-body">';
            echo "<p>".$pedidos['nome']."</p>
            <p>".$pedidos['email']."</p>
            <p>Dia do pedido: " . $pedidos['dia'] . "</p>
            <p> Hora do pedido: " . $pedidos['hora'] . "</p>
            <p> Valor da Compra: R$ " . $pedidos['valor_total'] . "
            ";
            echo '<br><br>';
            echo '<hr>';
            echo '<br>';
            //botões
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>


    <script src="../../js/menu.js" type="text/javascript"></script>
    <script src="../../js/confirmLogoutAdmin.js"></script>
</body>

</html>