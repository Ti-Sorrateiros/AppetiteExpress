<?php
include ('../../../database/conn.php');

$rua= $_POST['rua'];
$numero= $_POST['numero'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];

$local = $conn->prepare('INSERT INTO localizacao(rua,numero,bairro,cep) VALUES(:rua,:numero,:bairro,:cep)');
$local->execute( array(':rua'=>$rua,':numero'=>$numero,':bairro'=>$bairro,':cep'=>$cep));

echo '<script>
alert("Novo endereço Cadastrado!");
window.location.href="../../views/localizacao.php";
</script>';

?>