<?php
include ('../../../database/conn.php');
include('../user/protected.php');

$id = $_SESSION['id'];

$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$estado=$_POST['estado'];

$local = $conn->prepare('INSERT INTO localizacao(id_cliente, rua,cep,numero,bairro,estado) VALUES (:id_cliente, :rua,:cep,:numero,:bairro,:estado)');
$local->execute(array(
    ':rua' => $rua,
    ':cep' => $cep,
    ':numero' => $numero,
    ':bairro' => $bairro,
    ':estado'=>$estado,
    ':id_cliente'=> $id
    )
);

echo '<script>
alert("Novo endereço Cadastrado!");
window.location.href="../../views/escolherEndereco.php"
</script>';

?>