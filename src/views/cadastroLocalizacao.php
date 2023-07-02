<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/localizacao.css">
</head>
<body>
    <div>
    <div class="form">
        <h1>Cadastro de Endereço</h1>
        <form action="../controllers/localizacaocontroller/localizacaoController.php" method="post">    
            <label>Rua</label>
            <input type="text" name="rua">
            <br>
            <br>
            <label>Número</label>
            <input type="text" name="numero">
            <br>
            <br>
            <label>Bairro</label>
            <input type="text" name="bairro">
            <br>
            <br>
            <label>CEP</label>
            <input type="text" name="cep">
            <br>
            <br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
</body>
</html>