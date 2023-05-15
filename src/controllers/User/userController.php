<?php
include('../../../database/conn.php');

//variavel que pega os dados de todos os campos do formulario
$user = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//se o input com name create User for acionado criar usuario no banco
if (isset($user['createUser'])) {
    createUser($user);
}
if (isset($user['loginUser'])) {
    loginUser($user);
}

//função para criar usuario
function createUser($user)
{
    global $conn;

    $query = "SELECT * FROM usuarios WHERE email='" . $user['email'] . "'";
    $checkingUser = $conn->prepare($query);
    $checkingUser->execute();
    $result = $checkingUser->rowCount();

    if ($result > 0) {
        echo ("<script>
          alert('E-mail já cadastrado! ');
          window.location.href='../../views/cadastro.php';
          </script>");
    } else if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        echo ("<script>
         alert('EMAIL INVÁLIDO!');
         window.location.href='../../views/cadastro.php';
        </script>");
    } else {
        $options = [
            'cost' => 10
        ];
        $hashedPass = password_hash($user['password'], PASSWORD_DEFAULT, $options);
        $date = date('Y-m-d H:i:s');
        $queryUser =
            "INSERT INTO usuarios (id_perfil, nome, email, telefone, endereco, senha)
             VALUES (2, '{$user['nome']}', '{$user['email']}', '{$user['telefone']}', '{$user['endereco']}', '{$hashedPass}');";

        $signedUser = $conn->prepare($queryUser);
        $signed = $signedUser->execute();

        if ($signed == true) {
            echo "<script>
             alert('Cadastro Realizado com SUCESSO , Faça seu Login para entrar! ');
              window.location.href='../../views/login.php';
            </script>";
        } else {
            echo "<script>
            alert('ERRO  em enviar o cadastro com a conexao do banco , USUÁRIO NÂO CADASTRADO!!  ');
            window.location.href='../../views/cadastro.php';
          </script>";
        }
    }
}

function loginUser($user)
{
    global $conn;
    session_start();
    
    $senha = $_POST['password'];
    $email = $_POST['email'];

    $queryUser = "SELECT * FROM usuarios WHERE (email='" . $email . "');";
    $result = $conn->prepare($queryUser);
    $result->execute();
    $row = $result->rowCount();
    $data = $result->fetch();
    $hash = $data['senha'];

    if ($row > 0 && password_verify($senha, $hash)) {  //comando password com problema!
        $token = uniqid() . '_' . $data['id'] . '_' . $data['id_perfil'];
        $_SESSION["token"] = $token;
        $_SESSION["id"] = $data['id'];
        $_SESSION["id_perfil"] = $data["id_perfil"];

        if ($_SESSION["id_perfil"] == 1) {
            setcookie('login', $email);
            echo "<script>
                alert('Logado com Sucesso!');
                 window.location.href='../../views/admin.php';
                 </script>";
        } else {
            setcookie('login', $email);
            echo "<script>
                alert('Logado com Sucesso!');
                window.location.href='../../views/produtos.php';
                </script>";
        }
    } else {
        echo "<script>
         alert('Login e/ou senha incorretos');
         window.location.href='../../views/login.php';
         </script>";
    }
}

?>