<?php
include("../../../database/conn.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
}

$tabela = $conn->prepare("SELECT * FROM produtos WHERE id= :id ;");
$tabela->execute(array(':id'=>$id));
$rowTable = $tabela->fetch();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>
    <div>
        <form method="post" action="../../../controllers/products/productController.php">
            <input type="text" name="id" value='<?php echo $rowTable['id'] ?>' >
            <label>Nome do Produto <input type="text" name="nome" value='<?php echo $rowTable['nome'] ?>'></label>
            <label>Descrição <input type="text" name="descricao"  value='<?php echo $rowTable['descricao'] ?>'></label>
            <label>Preço <input type="text" name="preco" value='<?php echo $rowTable['preco'] ?>' ></label>
            <label>Adicionais <input type="text" name="adicionais" value='<?php echo $rowTable['adicionais'] ?>' ></label>
            <!-- <label>Imagem <input type="file" required></label> -->

            <button type="submit" name="updateProduct">Editar Produto</button>
        </form>
    </div>
    </div>
</body>

</html>