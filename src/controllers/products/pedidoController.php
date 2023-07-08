<?php
include('../../../database/conn.php');
include('../user/protected.php');



foreach($_SESSION['dados'] as $produtos){
    $date = date("Y-m-d");
    date_default_timezone_set('America/Sao_Paulo');
    $time = date("H:i:s");
    $pedido = $conn->prepare("INSERT INTO pedidos (id_produto, preco, quantidade, dia, hora) 
    VALUES (:id_produto, :preco , :quantidade , :dia , :hora)");
    $pedido->execute(array(
        ':id_produto' => $produtos['id_produtos'],
        ':preco' => $produtos['preco'],
        ':quantidade' => $produtos['quantidade'],
        ':dia' => $date,
        ':hora' => $time
    ));
}


//retirar a sessão de carrinho e de dados
unset($_SESSION['carrinho']);
unset($_SESSION['dados']);

header("location: ../../views/pedido.php")

?>