<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <div>

        <div align="center">
            <h1> Crie sua conta </h1>
            <h3>Preencha o formulário</h3>

            <form method="post" action="../controllers/user/userController.php" >
                <div>
                    <input type="text" name="nome" placeholder="Digite seu nome">
                </div>
                <br>
                <div>
                    <input type="email" name="email" placeholder="Digite seu melhor email">
                </div>
                <br>
                <div>
                    <input type="tel" name="telefone" placeholder="Digite seu telefone">
                </div>
                <br>
                <div>
                    <input type="text" name="endereco" placeholder="Digite seu endereco">
                </div>
                <br>
                <div>
                    <input type="text" name="senha" placeholder="Criar sua senha">
                </div>
                <br>
                <div>
                    <input type="submit" name="createUser" value="Cadastrar">
                </div>
            </form>
        </div>

    </div>
</body>

</html>