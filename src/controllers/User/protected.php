<?php 

if (empty($_SESSION)){
    session_start();
}

if (empty($_SESSION)) {
  die("
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet'
  integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
  <link href='https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap' rel='stylesheet'>
  <link rel='stylesheet' href='../styles/notAcess.css'>

  <div>
   <h1 id='titulo1'> Ops!</h1>
  </div>
  <div class='info'>
      <h1 id='titulo'>Sem sessão Iniciada, Entre para acessar </h1>
      <a href='../views/login.php'><button id='btn1'>Login</button></a>
  </div>
 ");
  }  
?>