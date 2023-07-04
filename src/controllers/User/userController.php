<?php
include('../../../database/conn.php');

//variavel que pega os dados de todos os campos do formulario
$user = filter_input_array(INPUT_POST, FILTER_DEFAULT);



//se o input com name create User for acionado criar usuario no banco
if (isset($user['createUser'])) {
    createUser($user);
} else if (isset($user['updateUser'])) {
    updateUser($user);
} else if (isset($user['loginUser'])) {
    session_start();
    loginUser($user);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteUser($id);
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
        $hashedPass = password_hash($user['senha'], PASSWORD_DEFAULT, $options);
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

function loginUser($user)
{
    global $conn;


    if (isset($user['loginUser'])) {
        $queryUser = "SELECT * FROM usuarios WHERE (email='" . $user['email'] . "');";
        $result = $conn->prepare($queryUser);
        $result->execute();

        $row = $result->rowCount();
        $usuario = $result->fetchAll(PDO::FETCH_ASSOC);


        //autenticacao de senha com hash
        // $data = $result->fetch();
        // print_r($data);
        $hash = $usuario[0]['senha'];
        $check = password_verify($usuario[0]['senha'], $hash);
        

        if ($row > 0) {
            session_start();
            $_SESSION['id'] = $usuario[0]['id'];
            echo "<script>
        window.location.href='../../views/produtos.php';
        </script>";
        } else {
            //     echo "<script>
            //  alert('Login e/ou senha incorretos');
            //  window.location.href='../../views/login.php';
            //  </script>";
        }

    }


    //sistema com a validacao da senha:
    /* if ($row > 0 && $check) {  
    //     $token = uniqid() . '_' . $data['id'] . '_' . $data['id_perfil'];
    //     $_SESSION["token"] = $token;
    //     $_SESSION["id"] = $data['id'];
    //     $_SESSION["id_perfil"] = $data["id_perfil"];

    //     if ($_SESSION["id_perfil"] == 1) {
    //         setcookie('login', $email);

    //         //Removi os alerts de logado com sucesso pois acho mais fluido
    //         //Acredito que Seja melhor um pop up já na pagina que redirecionar caso logue
    //         echo "<script>
                
    //              window.location.href='../../views/admin/cadastrarProdutos.php';
    //              </script>";
    //     } else {
    //         setcookie('login', $email);
    //         echo "<script>
            
    //             window.location.href='../../views/produtos.php';
    //             </script>";
    //     }
    // } else {
    //     echo "<script>
    //      alert('Login e/ou senha incorretos');
    //      window.location.href='../../views/login.php';
    //      </script>";
     } */
}


?>