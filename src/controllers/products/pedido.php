<?php
include('../../../database/conn.php');
include('../user/protected.php');

foreach($_SESSION['dados'] as $produtos){
    $pedido = $conn->prepare("INSERT INTO pedidos () VALUES (NULL,?,?,?)");
    $pedido->bindParam(1, $produtos['id_produto']);
    $pedido->bindParam(2, $produtos['preco']);
    $pedido->bindParam(3, $produtos['quantidade']);
    $pedido->execute();
}

//retirar a sessão de carrinho
unset($_SESSION['carrinho']);

header("location: ../../views/pedido.php")

?>