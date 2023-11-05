<?php

$host = 'localhost';
$dbname = 'sistema_de_pedidos';
$user = 'root';
$pass = '';
$port = 3307;

try{
$conn = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port.';' , $user , $pass);
} catch (PDOException $e){
    echo 'Error'. $e ->getMessage();
}


?>