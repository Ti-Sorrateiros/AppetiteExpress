<?php
include('../../../database/conn.php');
$id = $_POST['id'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$estado = $_POST['estado'];


$upd = $conn->prepare("UPDATE localizacao set cep=:cep, rua=:rua, numero=:numero, bairro=:bairro, estado=:estado WHERE id =:id");
$upd->execute(array(':cep'=>$cep,':rua'=>$rua,':numero'=>$numero,':bairro'=>$bairro,':estado'=>$estado,':id'=>$id ));

echo "<script>
alert('Alterado');
window.location.href='../../views/localizacao.php';
</script>";

?>