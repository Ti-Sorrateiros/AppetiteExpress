<?php
if (empty($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: ../../views/login.php");

?>