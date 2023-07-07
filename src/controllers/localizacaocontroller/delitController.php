<?php
include ('../../../database/conn.php');

    if( isset($_GET['id'])){
        $id = $_GET['id'];
   }else{
        header("Location: ../views/listalogin.php");
   }

    $deli=$conn->prepare('DELETE FROM localizacao WHERE id = :id');
    $deli->execute(array(':id'=>$id));

    echo"<script>
    alert('Deletado!');
    window.location.href='../../views/localizacao.php';
    </script>";
?>