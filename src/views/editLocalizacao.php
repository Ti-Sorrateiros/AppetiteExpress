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
    <link rel="stylesheet" href="../styles/editLocation.css">
    <title>Edição de Localização</title>
</head>

<body>
    <div class="form">
     <form action="../controllers/localizacaocontroller/updateController.php" method="post">
        <input type="hidden" name="id" value="<?php echo $rowTable[0]['id']; ?>" required>
        <label for="textCep">Cep</label>
        <input type="text" id="txtCep"  type="text" name="cep" value="<?php echo $rowTable[0]['cep']; ?>" >
        <label for="textCep">Rua</label>
        <input type="text" name="rua" id="txtrua" value="<?php echo $rowTable[0]['rua']; ?>" required />
        <label for="textCep">Número</label>
        <input type="text" name="numero" id="txtNumero" value="<?php echo $rowTable[0]['numero']; ?>" required>
        <label for="textCep">Bairro</label>
        <input type="text" name="bairro" id="textBairro" value="<?php echo $rowTable[0]['bairro']; ?>" required>
        <label for="textCep">Estado</label>
        <input type="text" name="estado"  id="textEstado" value="<?php echo $rowTable[0]['estado']; ?>" required />
        <button type="submit"> Salvar </button>
    </form>
        <button type="submit">Cadastrar</button>
    </div>


    <script src="../js/endereco.js" type="text/javascript"></script>
</body>

</html>