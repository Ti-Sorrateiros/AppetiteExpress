<?php
if (empty($_SESSION)) {
    session_start();
}

session_destroy();
unset($_SESSION['id']);
unset($_SESSION['id_perfil']);

header("Location: ../../../index.php");

?>