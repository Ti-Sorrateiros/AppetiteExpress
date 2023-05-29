<?php
include('conn.php');
$nome = $_POST['nome'];
$descricao=$_POST['descricao'];
$preco=$_POST['preco'];
$imagem=$_POST[''];
$adicionais = $_POST['adicionais'];

$cds = $conn->prepare("INSERT INTO produtos (nome,descricao,preco,imagem,adicionais) VALUES(:nome,:descricao,:preco,:imagem,:adicionais)");
$cadastro->execute(array(':nome'=>$nome,':descricao'=>$descricao, ':preco'=>$preco, ':imagem'=>$imagem, ':adicionais'=>$adicionais));

?>