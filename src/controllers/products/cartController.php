<?php

if (isset($_POST['removerProduto'])) {
    $removerCartId = $_POST['removerProduto'];
    deleteProductCart($removerCartId);
}

//se caso não tenha uma sessão (como login por exemplo)
if (empty($_SESSION)) {
    session_start();
}

//sem sessão de array de produtos, criar um array a esta sessão
if (empty($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

//array para sessão de dados
if (empty($_SESSION['dados'])) {
    $_SESSION['dados'] = array();
}

//recebimento dos dados
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nomeProduto = $_POST['nome'];
    $descricao = $_POST['desc'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $qtd = 1;
    $totalPrice = $_POST['price'];

    addCart($id, $nomeProduto, $descricao, $img, $price, $qtd, $totalPrice);
}

// Criar um array para cada produto
$produto = array();

function addCart($id, $nomeProduto, $descricao, $img, $price, $qtd, $totalPrice)
{
    // Buscar se o produto existe no carrinho
    $buscarSeProdutoExisteNoCarrinho = array_search($id, array_column($_SESSION['carrinho'], 0));
    $buscarSeProdutoExisteNosDados = array_search($id, array_column($_SESSION['dados'], 'id_produto'));


    /* parte do carrinho */

    if ($buscarSeProdutoExisteNoCarrinho !== false) {
        // O produto já existe no carrinho
        $produtoIndex = $buscarSeProdutoExisteNoCarrinho;
        $addQtd = $_SESSION['carrinho'][$produtoIndex][5] + 1;
        $_SESSION['carrinho'][$produtoIndex][5] = $addQtd;

        // Calcular o valor total do produto
        $valorTotal = $_SESSION['carrinho'][$produtoIndex][4] * $addQtd;
        $_SESSION['carrinho'][$produtoIndex][6] = $valorTotal;

    } 
    else {
        // O produto não existe no carrinho

        $produto = array($id, $nomeProduto, $descricao, $img, $price, $qtd, $totalPrice);

        $_SESSION['carrinho'][] = $produto;
    }

    /* Parte dos dados que serão enviados para o banco */

    if ($buscarSeProdutoExisteNosDados !== false) {

        $dadosIndex = $buscarSeProdutoExisteNosDados;

        $_SESSION['dados'][$dadosIndex]['valor_total'] = $valorTotal;
        $_SESSION['dados'][$dadosIndex]['quantidade'] = $addQtd;
    } 
    else {
        //Adicionar Produtos aos dados
        array_push(
            $_SESSION['dados'],
            array(
                'id_produto' => $id,
                'nome_produto' => $nomeProduto,
                'quantidade' => $qtd,
                'valor_total' => $totalPrice
            )
        );
    }


}


function deleteProductCart($removerCartId)
{
    // Verificar se o produto existe no carrinho
    $buscarSeProdutoExisteNoCarrinho = array_search($removerCartId, array_column($_SESSION['carrinho'], 0));

    if ($buscarSeProdutoExisteNoCarrinho !== false) {
        // O produto existe no carrinho
        $produtoIndex = $buscarSeProdutoExisteNoCarrinho;
        unset($_SESSION['carrinho'][$produtoIndex]);
        unset($_SESSION['dados'][$produtoIndex]);
        // Reorganizar as chaves do array
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    }
}








echo '<pre>';
print_r($_SESSION['dados']);
echo '</pre>';
?>