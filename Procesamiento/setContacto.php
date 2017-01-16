<?php
  session_start();
  if(!isset($_SESSION['user']) or $_SESSION['logIn'] != 'ok'){
    header('Location:Procesamiento/Salir.php');
  }

  include '../Librerias/LibreriaSetContacto.php';

  $obj = new LibreriaSetContacto();

  // echo $_POST['nombre'].'<br>';
  // echo $_POST['apPaterno'].'<br>';
  // echo $_POST['apMaterno'].'<br>';
  // echo $_POST['telefono'].'<br>';
  // echo $_POST['correo'].'<br>';
  // echo $_SESSION['user'].'<br>';

  $men = $obj->setContacto($_POST['nombre'],$_POST['apPaterno'],$_POST['apMaterno'],$_POST['telefono'],$_POST['correo'],$_SESSION['user']);

  if($men == 0){
    echo "<script>alert(\"Registro Exitoso\")</script>";
  }else{
    echo "<script>alert(\"Fallo el Registro\")</script>";
  }
?>
