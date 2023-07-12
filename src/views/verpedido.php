<?php
include('../../database/conn.php');


// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
// } else {
//     header("Location:.php");
// }

$id_pedido = $_GET['id_pedido'];

// $sql = $conn->prepare("SELECT  * as dia FROM  pedidos");
$sql = $conn->prepare("SELECT produtos.nome as nome_produto , item_pedido.quantidade , item_pedido.valor_total_unidade
FROM item_pedido 
inner join produtos 
inner join pedidos 
on item_pedido.id_pedido = pedidos.id and item_pedido.id_produto = produtos.id
where id_pedido = :id_pedido");

$sql->bindParam(':id_pedido', $id_pedido);
$sql->execute();
$rowTable = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="content">
        <h1>Seu Pedido <?php print_r($id_pedido); ?></h1>

        <?php
        foreach ($rowTable as $pedidos) {
            echo '<div class="card" >';
            //titulo
            echo "<h3 class='card-title'> " . $pedidos['nome_produto'] . "</h3>";
            //informações
            echo '<div class="card-body">';
            echo "
            <p>Quantidade : " . $pedidos['quantidade'] . "</p>
            <p> Valor da Compra: R$ " . number_format(($pedidos['valor_total_unidade']), 2, ",", '.') . "
            ";
            echo '<br>';
            echo '<hr>';
            echo '<br>';
            //botões
            echo '</div>';
            echo '</div>';
        }
        ?>

        <div>
            <?php
            $arrayValorPedido = array_column($rowTable, 'valor_total_unidade');
            echo '<h1> Valor Total deste pedido: R$ ';
            print_r(number_format((array_sum($arrayValorPedido)), 2, ",", '.')); 
            echo '</h1>';
            ?>
        </div>
    </div>
</body>

</html>