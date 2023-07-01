<?php
include ('../../../database/conn.php');
$rua= $_POST['rua'];
$numero= $_POST['numero'];
$endereco = $_POST['endereco'];

$local = $conn->prepare('INSERT INTO localizacao(rua,numero,endereco) VALUES(:rua,:numero,:endereco)');
$local->execute( array(':rua'=>$rua,':numero'=>$numero,':endereco'=>$endereco));

echo '<script>
alert(Novo endereço Cadastrado!):
window.location.href="../../views/localizacao.php";
</script>';

?>