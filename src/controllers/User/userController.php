<?php
include('../../../database/conn.php');

//variavel que pega os dados de todos os campos do formulario
$user = filter_input_array(INPUT_POST, FILTER_DEFAULT);



//se o input com name create User for acionado criar usuario no banco
if (isset($user['createUser'])  && $_POST['password']) {
    $senha = $_POST['password'];
    createUser($user, $senha);
} else if (isset($user['updateUser'])) {
    updateUser($user);
} else if (isset($user['loginUser']) && $_POST['password'] ) {
    $senha = $_POST['password'];
    loginUser($user, $senha);
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

function loginUser($user, $senha)
{
    global $conn;
    if (isset($user['loginUser'])) {
        //select para ver se o email tem no banco
        $queryUser = "SELECT * FROM usuarios WHERE (email= :email);";
        $result = $conn->prepare($queryUser);
        $result->execute(array(':email' => $user['email']));

        //contar a quantidade de row (coluna da tabela do banco de dados)
        $row = $result->rowCount();

        //autenticacao de senha com hash
        $dataUser = $result->fetch(PDO::FETCH_ASSOC);
        $hash = $dataUser['senha'];
        $check = password_verify($senha, $hash);

        //verifica se existe usuario no banco , e se senha está correta 
        if ($row > 0 && $check) {
            session_start();
            $_SESSION['id'] = $dataUser['id'];


            echo "<script>
        window.location.href='../../views/produtos.php';
        </script>";
        } else {
            echo "<script>
             alert('Login e/ou senha incorretos');
             window.location.href='../../views/login.php';
             </script>";
        }

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