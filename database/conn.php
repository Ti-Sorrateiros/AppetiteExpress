<?php

$host = 'localhost';
$dbname = 'dbCardapio';
$user = 'root';
$pass = '';
$port = 3312;

try{
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port.';' , $user , $pass);
} catch (PDOException $e){
    echo 'Error'. $e ->getMessage();
}


?>