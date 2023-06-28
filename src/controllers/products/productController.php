<?php
include('../../../database/conn.php');

$product = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($product['createProduto'])) {
    createProduct($product);
} else if (isset($product['updateProduct'])) {
    updateProduct($product);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteProduct($id);
}

function createProduct($product)
{
    global $conn;

    if ($product) {
        $cadastroProduto = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, adicionais)
        VALUES (:nome, :descricao, :preco, :adicionais)");
        $cadastroProduto->execute(
            array(
                ':nome' => $product['nome'],
                ':descricao' => $product['descricao'],
                ':preco' => $product['preco'],
                ':adicionais' => $product['adicionais']
            )
        );

        echo ("<script>
       alert('Produto Foi Cadastrado com Sucesso');
       window.location.href='../../views/admin/cadastrarProdutos.php';
      </script>");
    } else {
        echo ("<script>
         alert('ERRO: Produto NAO FOI CADASTRO');
         window.location.href='../../views/admin/cadastrarProdutos.php';
        </script>");
    }

}

function updateProduct($product)
{
    global $conn;

    if (isset($product)) {
        $updateProduto = $conn->prepare("UPDATE produtos SET nome = :nome , descricao = :descricao , preco = :preco,  adicionais = :adicionais WHERE id = :id");
        $updateProduto->execute(
            array(
                ':nome' => $product['nome'],
                ':descricao' => $product['descricao'],
                ':preco' => $product['preco'],
                ':adicionais' => $product['adicionais'],
                ':id' => $product['id']
            )
        );

        echo ("<script>
        alert('Produto Foi Editado com Sucesso');
        window.location.href='../../views/admin/verProdutos.php';
       </script>");
    } else {
        echo ("<script>
         alert('ERRO: NAO FOI ATUALIZADO');
         window.location.href='../../views/admin/verProdutos.php';
        </script>");
    }
}

function deleteProduct($id)
{
    global $conn;

    if (isset($id)) {
        $deleteProduct = $conn->prepare('DELETE FROM produtos WHERE id= :id');
        $deleteProduct->execute(array(':id' => $id));

        echo "<script>
        alert('Produto Deletado!');
        window.location.href='../../views/admin/verProdutos.php';
        </script>";
    } else {
        echo "<script>
    alert('Erro ao Deletar');
    window.location.href='../../views/admin/verProdutos.php';
    </script>";
    }
}


?>