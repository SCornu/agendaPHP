<?php
  session_start();
  if(!isset($_SESSION['user']) or $_SESSION['logIn'] != 'ok'){
    header('Location:Procesamiento/Salir.php');
  }
  include '../Librerias/LibreriaBorrar.php';

  // echo $_POST['nombre'].'<br>';
  // echo $_POST['apPaterno'].'<br>';
  // echo $_POST['apMaterno'].'<br>';
  // echo $_SESSION['user'].'<br>';

  $obj = new LibreriaBorrar();

  $borrado = $obj->borrar($_POST['nombre'],$_POST['apPaterno'],$_POST['apMaterno'],$_SESSION['user']);

  if($borrado == 0){
    echo "<script>alert('se borro al contacto de la agenda');</script>";
  }else {
    echo "<script>alert('No se pudo borrar al contacto de la agenda');</script>";
  }
?>
