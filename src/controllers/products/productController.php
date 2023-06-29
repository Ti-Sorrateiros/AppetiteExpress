<?php
include('../../../database/conn.php');

$product = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($product['createProduto']) && $_FILES['imagem']) {
    $imagem = $_FILES['imagem'];
    createProduct($product, $imagem);
} else if (isset($product['updateProduct'])) {
    updateProduct($product);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteProduct($id);
}

function createProduct($product, $imagem)
{
    global $conn;

    $pasta = "arquives/";
    $nomeDaImagem = $imagem['name'];
    $novoNomeDoArquivo = uniqid(); //definir codificação aleatório para o nome da imagem
    $extensao = strtolower(pathinfo($nomeDaImagem, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != 'png') {
        die("Tipo de arquivo não aceito");
    }

    $pathImagem = $pasta . $novoNomeDoArquivo . "." . $extensao;

    $imagemEnviada = move_uploaded_file($imagem['tmp_name'], $pathImagem);


    if ($imagemEnviada) {

    $cadastrarProduto = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, nome_imagem, path_imagem, adicionais)
    VALUES (:nome, :descricao, :preco, :nome_imagem, :path_imagem ,:adicionais)");
    $cadastrarProduto->execute(
            array(
                ':nome' => $product['nome'],
                ':descricao' => $product['descricao'],
                ':preco' => $product['preco'],
                ':adicionais' => $product['adicionais'],
                ':nome_imagem' => $nomeDaImagem,
                ':path_imagem' => $pathImagem
            )
        );

    echo ("<script>
     alert('Produto e Imagem Enviada');
     window.location.href='../../views/admin/cadastrarProdutos.php';
    </script>");

    }


    // echo ("<script>
    //  alert('ERRO: Produto NAO FOI CADASTRO');
    //  window.location.href='../../views/admin/cadastrarProdutos.php';
    // </script>");



    // if (isset($_FILES['imagem'])) {
    //     // variavel que da imagem
    //     $imagem = $_FILES['imagem'];

    //     // 
    //     $pasta = "../../../controllers/products/arquives/";
    //     $nomeDaImagem = $imagem['name'];
    //     //definir codificação aleatório para o nome da imagem
    //     $novoNomeDoArquivo = uniqid();
    //     $extensao = strtolower(pathinfo($nomeDaImagem, PATHINFO_EXTENSION));

    //     if ($extensao != "jpg" && $extensao != 'png') {
    //         die("Tipo de arquivo não aceito");
    //     }

    //     $pathImagem = $pasta . $novoNomeDoArquivo . "." . $extensao;
    //     $imagemEnviada = move_uploaded_file($imagem['tpm_name'], $pathImagem);

    //     if ($imagemEnviada) {
    //         $postImagem = $conn->prepare("INSERT INTO produtos (nome_imagem, path_imagem) values ('$nomeDaImagem', '$pathImagem') ") or die('Erro ao enviar imagem');
    //         echo "<p>Arquivo enviado com sucesso</p>";
    //     }


    // }

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