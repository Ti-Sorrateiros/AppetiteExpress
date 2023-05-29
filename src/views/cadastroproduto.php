<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div>
        <h1>Cadastro</h1>
    </div>
    <form action="../controller/controllercadastro.php" method="post">
        <label>Descrição</label> <input type="text" name="descricao" required>
        <label>Preço</label><input type="text" name="preco" required>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>