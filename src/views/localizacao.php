<?php
include('../../database/conn.php');
$tabela = $conn->prepare("SELECT * FROM localizacao");
$tabela->execute();
$rowTabela = $tabela->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/content.css">
    <link rel="stylesheet" href="../styles/GoogleFonts/GoogleFonts.css">
    <link rel="shortcut icon" href="../images/Hamburguer.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/localizacao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Localização</title>
</head>

<body>
    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li class="item-menu">
                <a href="produtos">
                    <span class="icon"><i class="bi bi-bag-fill"></i></span>
                    <span class="txt-link">Produtos</span>
                </a>
                </div>
            </li>

            <li class="item-menu ativo">
                <a href="localizacao">
                    <span class="icon"><i class="bi bi-geo-alt-fill"></i></span>
                    <span class="txt-link">Localização</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="carrinho">
                    <span class="icon"><i class="bi bi-cart4"></i></span>
                    <span class="txt-link">Carrinho</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="pedido">
                    <span class="icon"><i class="bi bi-clipboard2-fill"></i></span>
                    <span class="txt-link">Seus Pedidos</span>
                </a>
                </div>
            </li>
            <li class="item-menu">
                <a id="logout">
                    <span class="icon"><i class="bi bi-door-closed-fill"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="content">
        <div class="item-titulo">
            <h1>Endereço para Entrega</h1>
            <br>
            <br>
        </div>
        
        <br>
            <table> 
                <tbody>
                    <?php
                    
                    foreach($rowTabela as $linha){
                        //a tag TR é utilizada para definir uma linha dentro de uma tabela.
                        echo '<tr>';
                        echo "<th scope='row'>".$linha['id']."</th>";
                        echo "<td>" . $linha['cep'] . "</td>";
                        echo "<td>" . $linha['rua'] . "</td>";
                        echo "<td>" . $linha['numero'] . "</td>";
                        echo "<td>" . $linha['bairro'] . "</td>";
                        echo "<td>" . $linha['estado'] . "</td>";
                        echo '<td><a href=editLocalizacao.php?mensagem=' . $linha['id'] . ' class="btn btn-warning">Editar</a></td>';
                        echo '<td><a href=../controller/controllerdelit.php?mensagem=' . $linha['id'] . ' class="btn btn-danger">Excluir</a></td>';
                        echo '</tr>';
                    
                    }
                    
                    /// foreach ($rowTabela as $linha) {
                        
                    //    echo '<tr>';
                     //   echo '<td>  <div class="card">
                     //   <img class="card-image" src="../images/mapa.png" alt="">
                     //       <p class="card-title">Casa</p>
                     //       <p class="card-body">'
                     //       . $linha['rua'].', '. $linha['numero'].', '.$linha['cep'].'</p>
                      //      <a href="editLocalizacao.php"><button> Editar Endereço<span 
                      //       class="endereco">&nbsp;<i class="bi bi-geo-alt-fill"></i></span></button></a>
                       //   </div></td>';
                      //  echo'</tr>';
                        
                    //
                    ?>
                </tbody>
            </table>
            <button> <a href="cadastroLocalizacao.php">Realizar Cadastro</a></button>
    </div>

    <script src="../js/menu.js" type="text/javascript"></script>
    <script src="../js/confirmlogout.js"></script>
</body>


</html>