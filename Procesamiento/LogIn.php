<?php
  session_start();
  include '../Librerias/LibreriaLogIn.php';

  // echo $_POST['usuario'].'<br>';
  // echo $_POST['pass'];

  $obj = new LogIn();

  $existe = $obj->getUser($_POST['usuario']);

  if ($existe) {
    foreach ($existe as $key) {
      if (password_verify($_POST['pass'], $key[3])) {
        $_SESSION['user'] = $key[1];
        $_SESSION['logIn'] = 'ok';
        echo '0';
      }else {
        echo '1';
        session_destroy();
      }
    }
  }

?>
