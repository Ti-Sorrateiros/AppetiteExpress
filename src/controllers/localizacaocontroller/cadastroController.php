<?php
include ('../../../database/conn.php');

$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$estado=$_POST['estado'];

$local = $conn->prepare('INSERT INTO localizacao(cep,rua,numero,bairro,estado) VALUES (:rua,:numero,:bairro,:cep,:estado)');
$local->execute(array(
    ':rua' => $rua,
    ':numero' => $numero,
    ':bairro' => $bairro,
    ':cep' => $cep,
    ':estado'=>$estado
    )
);

echo '<script>
alert("Novo endereço Cadastrado!");
window.location.href="../../views/localizacao.php";
</script>';

?>