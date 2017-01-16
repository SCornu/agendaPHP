<?php
  include '../Librerias/LibreriaRegistro.php';

  $obj = new registro();

  // echo $_POST['usuario'].'<br>';
  // echo $_POST['email'].'<br>';
  // echo $_POST['pass'].'<br>';

  $existe = $obj->getUser($_POST['emailRegistro']);


  if($existe){
    echo "1";
  }else{
    // echo 'no existe y se tiene que registrar';
    $creacion = $obj->setUser($_POST['usuarioRegistro'],$_POST['emailRegistro'],$_POST['contra']);

    if($creacion == 0){
      echo '2';
    }else{
      echo '3';
    }
  }
?>
