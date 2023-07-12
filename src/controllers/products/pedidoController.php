<?php
include('../../../database/conn.php');
include('../user/protected.php');
include('cartController.php');

//pegar o id do usuario, pegar os dados 
if (isset($_SESSION['id'])) {
    //acesso o produto
    $arrayDadosProduto = array_column($_SESSION['dados'], 'id_produto');
    $valor_total_de_cada_produto = array_column($_SESSION['dados'], 'valor_total');

    $id_cliente = $_SESSION['id'];
    $id_produto = array_search($id , $arrayDadosProduto);
    $total = array_sum($valor_total_de_cada_produto);

    //Adicionar dia e hora
    date_default_timezone_set('America/Sao_Paulo');
    $dia = date("Y-m-d");
    $hora = date("H:i:s");

    // Inserir um novo pedido na tabela 'pedidos'
    $query = "INSERT INTO pedidos (id_cliente, valor_total, hora, dia) VALUES (:id_cliente, :valor_total, :hora, :dia)";
    $pedidos = $conn->prepare($query);
    $pedidos->bindParam(':id_cliente', $id_cliente); // id_cliente é o id da session
    $pedidos->bindParam(':valor_total', $total);
    $pedidos->bindParam(':hora', $hora);
    $pedidos->bindParam(':dia', $dia);
    $pedidos->execute();

    // Recuperar o ID do novo pedido
    $id_pedido = $conn->lastInsertId();
    
    // Iterar sobre os produtos e inserir registros na tabela 'item_pedido'
    foreach ($_SESSION['dados'] as $produto) {
        $id_produto = $produto['id_produto'];
        $quantidade = $produto['quantidade'];
        $valor_total_unidade = $produto['valor_total'];
        
        $query = "INSERT INTO item_pedido (id_pedido, id_produto, quantidade, valor_total_unidade) VALUES (:id_pedido, :id_produto, :quantidade, :valor_total_unidade)";
        $item = $conn->prepare($query);
        $item->bindParam(':id_pedido', $id_pedido);
        $item->bindParam(':id_produto', $id_produto);
        $item->bindParam(':quantidade', $quantidade);
        $item->bindParam(':valor_total_unidade', $valor_total_unidade);
        $item->execute();
    }
}

//retirar a sessão de carrinho e de dados
unset($_SESSION['carrinho']);
unset($_SESSION['dados']);

header("location: ../../views/pedido.php")

    ?>