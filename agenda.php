<?php
  session_start();
  if(!isset($_SESSION['user']) or $_SESSION['logIn'] != 'ok'){
    header('Location:Procesamiento/Salir.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agenda</title>
    <script src="public/js/jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <script src="public/js/bootstrap.js"></script>
  </head>
  <body>

  </body>
</html>
