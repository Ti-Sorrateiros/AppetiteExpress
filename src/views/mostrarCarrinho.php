<?php
include('../../database/conn.php');

$total = null; //variavel total que recebe valor nulo

//criando um loop para sessão carrinho recebe o $id e a quantidade 
foreach ($_SESSION['carrinho'] as $id => $qnt){
    $consulta = $conn->prepare("SELECT * FROM produtos where id = :id ");
    $consulta->execute(array(':id' => $id));
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

    //variavel que recebe e mostra o produto
    $produto = $exibe['id']; 
    //variavel que recebe o mostra o preco
    $preco = number_format(($exibe['preco']), 2, ',' , '.');
    //variavel que recebe preço * quantidade
    $total += $exibe['preco'] * $qnt; 
}

?>