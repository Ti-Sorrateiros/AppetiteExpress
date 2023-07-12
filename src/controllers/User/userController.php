<?php
include('../../../database/conn.php');

//variavel que pega os dados de todos os campos do formulario
$user = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//se o input com name create User for acionado criar usuario no banco
if (isset($user['createUser']) && $_POST['password']) {
    $senha = $_POST['password'];
    createUser($user, $senha);
} else if (isset($user['updateUser'])) {
    updateUser($user);
} else if (isset($user['loginUser']) && $_POST['password'] && $_POST['email']) {
    $senha = $_POST['password'];
    $email = $_POST['email'];
    loginUser($user, $senha, $email);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteUser($id);
}


//função para criar usuario
function createUser($user, $senha)
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
    }
    // else if (isset($user['senha']) != isset($user['senhaConf'])){
    //     echo ("<script>
    //      alert('Senhas diferentes');
    //      window.location.href='../../views/cadastro.php';
    //     </script>");
    // } 
    else {
        $options = [
            'cost' => 10
        ];
        $hashedPass = password_hash($senha, PASSWORD_DEFAULT, $options);
        $queryUser =
            "INSERT INTO usuarios (id_perfil, nome, email, telefone, senha)
             VALUES (:id, :nome, :email, :telefone, :senha)";

        $signedUser = $conn->prepare($queryUser);
        $signed = $signedUser->execute(array(
            ':id'=> 1,
            ':nome' => $user['nome'],
            ':email'=> $user['email'],
            'telefone'=> $user['telefone'],
            ':senha' => $hashedPass
        ));

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

function loginUser($user, $senha, $email)
{
    global $conn;
    //select para ver se o email tem no banco
    $result = $conn->prepare("SELECT * FROM usuarios WHERE (email= :email);");
    $result->execute(array(':email' => $user['email']));
    $row = $result->rowCount();

    //autenticacao de senha com hash
    $usuario = $result->fetch(PDO::FETCH_ASSOC);
    $hash = $usuario['senha'];
    $check = password_verify($senha, $hash);

    //verifica se existe usuario no banco , e se senha está correta 
    if ($row > 0 && $check) {
        $token = uniqid() . '_' . $usuario['id'] . '_' . $usuario['id_perfil'];
        session_start();
        $_SESSION['token'] = $token;
        $_SESSION['id'] = $usuario['id'];
        $_SESSION["id_perfil"] = $usuario["id_perfil"];

        if($_SESSION['id_perfil'] == 2){
            header("Location: ../../views/admin");
        } else {
            header("Location: ../../views/produtos.php");
        }
    } else {
        echo 'Login e/ou senha incorretos <a href="../../views/login.php"> </a>';
        echo "<script>
              alert('Login e/ou senha incorretos');
              window.location.href='../../views/login.php';
              </script>";
    }

}

function deleteUser($id)
{
    global $conn;

    if (isset($id)) {
        $deleteUser = $conn->prepare('DELETE FROM usuarios WHERE id= :id');
        $deleteUser->execute(array(':id' => $id));

        echo "<script>
    alert('Usuário Deletado!');
    window.location.href='../../views/admin/usuarios.php';
    </script>";
    } else {
        echo "<script>
    alert('Erro ao Deletar');
    window.location.href='../../views/admin/usuarios.php';
    </script>";
    }
}

function updateUser($user)
{
    global $conn;

    if (isset($user['id']) && $user['nome'] && $user['email'] && $user['endereco']) {
        $deleteUser = $conn->prepare('UPDATE usuarios SET nome = :nome , email = :email , endereco = :endereco  WHERE id= :id');
        $deleteUser->execute(
            array(
                ':id' => $user['id'],
                ':nome' => $user['nome'],
                ':email' => $user['email'],
                ':endereco' => $user['endereco']
            )
        );

        echo "<script>
    alert('Usuário Editado!');
    window.location.href='../../views/admin/usuarios.php';
    </script>";
    } else {
        echo "<script>
    alert('Erro ao Editar');
    window.location.href='../../views/admin/usuarios.php';
    </script>";
    }
}



?>