<?php
    include('conn.php');

    if( isset($_GET['mensagem'])){
        $id = $_GET['mensagem'];
   }else{
        header("Location: ../views/listalogin.php");
   }

    $deli=$conn->prepare('DELETE FROM localizacao WHERE id = :id');
    $deli->execute(array(':id'=>$id));

    echo"<script>
    alert('Deletado!');
    window.location.href='../views/listalogin.php';
    </script>";
?>