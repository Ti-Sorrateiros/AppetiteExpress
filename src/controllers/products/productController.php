<?php
include('../../../database/conn.php');

$product = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(isset($product['createProduto'])){
    createProduct($product);
}

function createProduct($product)
{
    global $conn;

    $cadastroProduto = $conn->prepare("INSERT INTO produtos
    (nome, descricao, preco, adicionais) 
    VALUES
    (:nome,:descricao,:preco,:adicionais)");
    $cadastroProduto->execute(array(
    ':nome'=>$product['nome'],
    ':descricao'=>$product['descricao'],
    ':preco'=>$product['preco'],
    ':adicionais'=>$product['adicionais']
    ));
    
    if($cadastroProduto == true){
        echo ("<script>
         alert('Produto Foi Cadastrado com Sucesso');
         window.location.href='../../views/admin/cadastrarProdutos.php';
        </script>");
    } 
    //precisa fazer o exception para erro
    // else {
    //     echo ("<script>
    //      alert('ERRO: Produto NAO FOI CADASTRO');
    //      window.location.href='../../views/admin/cadastrarProdutos.php';
    //     </script>");
    // }

}


?>