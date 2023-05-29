<?php
include('../../../database/conn.php');

$readUser = $conn->prepare('SELECT * FROM usuarios');
$readUser->execute();
$rowTable = $readUser->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/centralize.css">
    <link rel="stylesheet" href="../../styles/table.css">
    <title>Usuarios </title>
</head>

<body>

    <h1 class="center">Usuarios</h1>
    <div class="center">
        <table>
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Endereco</th>
                <th>Telefone</th>
                <th>Editar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php
                foreach ($rowTable as $linha) {
                    echo '<tr>';
                    echo '<th scope="row">' . $linha['id'] . '</th>';
                    echo '<td>' . $linha['nome'] . '</td>';
                    echo '<td>' . $linha['email'] . '</td>';
                    echo '<td>' . $linha['endereco'] . '</td>';
                    echo '<td>' . $linha['telefone'] . '</td>';
                    echo '<td><a href=""><button class="editar">Editar</button></a></td>';
                    echo '<td><a href="../../controllers/user/userController.php?id="'.$linha['id'] .'"><button class="excluir">Excluir</button></a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>