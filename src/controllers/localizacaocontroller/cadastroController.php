<?php
include ('../../../database/conn.php');
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$estado=$_POST['estado'];

$local = $conn->prepare('INSERT INTO localizacao(rua,cep,numero,bairro,estado) VALUES (:rua,:cep,:numero,:bairro,:estado)');
$local->execute(array(
    ':rua' => $rua,
    ':cep' => $cep,
    ':numero' => $numero,
    ':bairro' => $bairro,
    ':estado'=>$estado
    )
);

echo '<script>
alert("Novo endereço Cadastrado!");
window.location.href="../../views/localizacao.php";
</script>';

?>