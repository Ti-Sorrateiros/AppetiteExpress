<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap@5.2.3.css">
    <title>Home</title>
</head>
<body>
    
    <div align="center">
        <h1>Bem vindo a nossa Pizzaria! </h1>
    </div>
    <div align="center">
        <p>Faça seu Pedido:</p>
    </div>

    <div align="center" class='container-sm' id='table-tamanho'>
        <h3> Escolha o Tamanho da Pizza:</h3>
        <br>
        <table class='table'>
            <thead align="center">
                <th>Grande</th>
                <th>Média</th>
                <th>pequena</th>
                <th>Broto</th>
            </thead>
            <tbody align="center">
                <tr>
                    <td>12 Fatias- 40cm </td>
                    <td>8 fatias - 35cm</td>
                    <td>6 fatias - 30 cm</td>
                    <td>4 fatias - 25 cm</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div align="center" class='container-sm'>
        <h3>Sabores de Pizza</h3>
        <br>
        <p>Deseja metade do sabor ?</p>
        <p><input type="checkbox" name="sim"> Sim</p>
        <p><input type="checkbox" name="não"> Não</p>

        Qual o sabor de Pizza?
        <br>
        <p><input type="checkbox" name="Calabresa"> Calabresa</p>
        <p><input type="checkbox" name="Portuguesa"> Portuguesa</p>
        <p></p>
    </div>
</body>
</html>