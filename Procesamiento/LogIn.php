<?php
  include '../Librerias/LibreriaLogIn.php';

  // echo $_POST['usuario'].'<br>';
  // echo $_POST['pass'];

  $obj = new LogIn();

  $existe = $obj->getUser($_POST['usuario']);

  
?>
