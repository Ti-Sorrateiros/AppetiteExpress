<?php
include('../../../database/conn.php');

$product = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(isset($product['createProduto'])){
    createProduct($product);
} else if (isset($product['updateProduto'])){
    updateProduct($product);
} 

function createProduct($product)
{
    global $conn;

    $cadastroProduto = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, adicionais) VALUES (:nome, :descricao, :preco, :adicionais)");
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

function updateProduct($product)
{
    global $conn;

    $updateProduto = $conn->prepare("UPDATE produtos set :nome , :descricao , :preco, :adicionais WHERE id= :id");
    $updateProduto->execute(array(
    ':nome'=>$product['nome'],
    ':descricao'=>$product['descricao'],
    ':preco'=>$product['preco'],
    ':adicionais'=>$product['adicionais'],
    ':id'=>$product['id']
    ));
    
    if($updateProduto == true){
        echo ("<script>
         alert('Produto Foi Editado com Sucesso');
         window.location.href='../../views/admin/cadastrarProdutos.php';
        </script>");
    } 
    //precisa fazer o exception para erro
    // else {
    //     echo ("<script>
    //      alert('ERRO: NAO FOI ATUALIZADO');
    //      window.location.href='../../views/admin/cadastrarProdutos.php';
    //     </script>");
    // }

}

//adicionar delete!
function deleteProduct($product)
{

}


?>