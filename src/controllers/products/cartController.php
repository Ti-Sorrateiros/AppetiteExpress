<?php
//se caso não tenha uma sessão (como login por exemplo)
if (empty($_SESSION)) {
    session_start();
}

//sem sessão de array de produtos, criar um array a esta sessão
if (empty($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
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

    //enviar os dados para a função 
    addProductCart($id, $nomeProduto, $descricao, $img, $price, $qtd, $totalPrice );
}


//adicionar dados recebidos ao carrinho
function addProductCart($id, $nomeProduto, $descricao, $img, $price, $qtd, $totalPrice)
{

    // Criar um array para cada produto
    $produto = array();

    // Buscar se o produto existe no carrinho
    $buscarSeProdutoExisteNoCarrinho = array_search($id, array_column($_SESSION['carrinho'], 0));

    if ($buscarSeProdutoExisteNoCarrinho !== false) {
        // O produto já existe no carrinho
        $produtoIndex = $buscarSeProdutoExisteNoCarrinho;
        $addQtd = $_SESSION['carrinho'][$produtoIndex][5] + 1;
        $_SESSION['carrinho'][$produtoIndex][5] = $addQtd;

        // Calcular o valor total do produto
        $valorTotal = $_SESSION['carrinho'][$produtoIndex][4] * $addQtd;
        $_SESSION['carrinho'][$produtoIndex][6] = $valorTotal;
    } else {
        // O produto não existe no carrinho

        // Recebendo os dados e colocando em um array de produto
        $produto = array($id, $nomeProduto, $descricao, $img, $price, $qtd, $totalPrice);

        // Adicionar o produto ao carrinho
        $_SESSION['carrinho'][] = $produto;
    }


    //array para sessão de dados
    if (empty($_SESSION['dados'])) {
        $_SESSION['dados'] = array();
    }

    //guardar os dados do carrinho para depois envia para o banco
    array_push(
        $_SESSION['dados'],
        array(
            'id_produto' => $id,
            'nome_produto' => $nomeProduto,
            'img' => $price,
            'preco' => $img,
            'quantidade' => $qtd
        )
    );
}



?>