<?php
include('../../database/conn.php');
if (isset($_GET['mensagem'])){
    $id = $_GET['mensagem'];
}
else{
    header("Location:.php");
}
$select=$conn->prepare("SELECT * FROM localizacao WHERE id=:id");
$select->execute(array('id'=>$id));
$rowTable = $select->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Localização</title>
</head>
<body>
    <h1>oi</h1>
    <form action="../controllers/localizacaocontroller/updateController.php"  method="post">
        <input type="text" name="cep" value="<?php echo $rowTable[0]['cep']; ?>">
        <input type="text" name="rua" value="<?php echo $rowTable[0]['rua'];  ?>" />
        <input type="text" name="numero" value="<?php echo $rowTable[0]['numero'];?>">
        <input type="text" name="bairro" value="<?php echo $rowTable[0]['bairro']; ?>">
        <input type="text" name="estado" value="<?php echo $rowTable[0]['estado'];  ?>" />
        <button type="submit">Salvar </button>
    </form>
</body>
</html>