<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/GoogleFonts/GoogleFonts.css">
    <!-- <link rel="stylesheet" href="../styles/bootstrap/Bootstrap@5.2.3.css"> -->
    <title>Login</title>
</head>

<body>
    <div class="container" align="center">
            <h1 id="TLogin">Faça seu Login</h1>
        <h3 id="SLogin">Informe um login valido</h3>
        <form method="post" action="">
                <div class="form__group field">
                <input type="email" class="form__field" placeholder="Name" required="">
                <label for="email" class="form__label">E-mail:</label>
            </div>
            <br>
            <div class="Senha">
                <div class="form__group field">
                <input type="password" class="form__field" placeholder="Name" required="">
                <label for="password" class="form__label">Senha:</label>
            </div>
            </div>
            <br>
            <div>
                <button id="Lbutton" type="submit" onclick="" name="loginUser">ENTRAR</button>
            </div>
        </form>
            <div>
                <p id="Cadastrar-se">Ainda não é cadastrado? <a href="cadastro" style="color:#73BB18;">Cadastre-se</a></p>
            </div>

    </div>
</body>

</html>