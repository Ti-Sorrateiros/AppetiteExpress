<?php
include('../../../database/conn.php');
include('../../controllers/user/protectedAdmin.php');

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/centralize.css">
    <link rel="stylesheet" href="../../styles/table.css">
    <title>Usuarios </title>
</head>

<body>


    <div class="content">
        <h1 class="center">Usuarios</h1>
        <div class="center">
            <table>
                <thead>
                    <th>Id</th>
                    <th>Id_perfil</th>
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
                        echo '<th scope="row">' . $linha['id_perfil'] . '</th>';
                        echo '<td>' . $linha['nome'] . '</td>';
                        echo '<td>' . $linha['email'] . '</td>';
                        echo '<td>' . $linha['endereco'] . '</td>';
                        echo '<td>' . $linha['telefone'] . '</td>';
                        echo '<td><a href="formEdit/editarUsuario.php?id='.$linha['id'].'"><button class="editar">Editar</button></a></td>';
                        echo '<td><a onclick="deleteUser('.$linha['id'] .')"><button class="excluir">Excluir</button></a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>


    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
                <li class="item-menu ">
                    <a href="cadastrarProdutos">
                        <span class="icon"><i class="bi bi-bag-fill"></i></span>
                        <span class="txt-link"> CadastrarProdutos</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="pedidosFeitos">
                        <span class="icon"><i class="bi bi-bag-check-fill"></i></span>
                        <span class="txt-link"> PedidosFeitos</span>
                    </a>
                </li>
                <li class="item-menu ativo">
                    <a href="usuarios">
                        <span class="icon"><i class="bi bi-person-circle"></i></span>
                        <span class="txt-link"> Usuarios</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="verprodutos">
                        <span class="icon"><i class="bi bi-eye-fill"></i></span>
                        <span class="txt-link">VerProdutos</span>
                    </a>
                </li>
            </ul>
    </nav>
    <script src="../../js/menu.js" type="text/javascript"></script>
    <script src="../../js/noRefresh.js" type="text/javascript"></script>
    <script src="../../js/confirmDelete.js" type="text/javascript"></script>
</body>

</html>