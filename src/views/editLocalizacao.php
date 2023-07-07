<?php
include('../../database/conn.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location:.php");
}
$select = $conn->prepare("SELECT * FROM localizacao WHERE id=:id");
$select->execute(array('id' => $id));
$rowTable = $select->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/cadastro.css">
    <title>Edição de Localização</title>
</head>

<body>
    <form action="../controllers/localizacaocontroller/updateController.php" method="post">
        <input type="hidden" name="id" value="<?php echo $rowTable[0]['id']; ?>" required>
        <input type="text" id="txtCep" name="cep" value="<?php echo $rowTable[0]['cep']; ?>" required>
        <input type="text" name="rua" id="txtrua" value="<?php echo $rowTable[0]['rua']; ?>" required />
        <input type="text" name="numero" id="txtNumero" value="<?php echo $rowTable[0]['numero']; ?>" required>
        <input type="text" name="bairro" id="textBairro" value="<?php echo $rowTable[0]['bairro']; ?>" required>
        <input type="text" name="estado"  id="textEstado" value="<?php echo $rowTable[0]['estado']; ?>" required />
        <button type="submit"> Salvar </button>
    </form>

    <script src="../js/endereco.js" type="text/javascript"></script>
</body>

</html>