<?php
include('../controler/conn.php');
$tabela = $conn->prepare("SELECT * FROM cadastroproduto");
$tabela->execute();
$rowTabela = $tabela->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/Hamburguer.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    <tbody>
        <table>
            <tr>
                <td>ID</td>
                <td>Descrição</td>
                <td>Preço</td>
            </tr>
        <?php
        foreach($rowTabela as $linha){
            echo '<tr>';
            echo "<th>".$linha['id']."</th>";
            echo "<td>".$linha['descricao']."</td>";
            echo "<td>".$linha['preco']."</td>";
            echo '<td><a href=../controllercadastro.php?mensagem='.$linha['id'].'>Editar</a></td>';
            echo '<td><a href=../controllercadastro.php?mensagem='.$linha['id'].'>Excluir</a></td>';
            echo '</tr>';
        }
        ?>
    </tbody>
    </table>
</body>
</html>