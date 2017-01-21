<?php
  session_start();
  if(!isset($_SESSION['user']) or $_SESSION['logIn'] != 'ok'){
    header('Location:Procesamiento/Salir.php');
  }
include '../Librerias/LibreriaGetBusqueda.php';

  // echo $_POST['opcion'].'<br>';

  switch ($_POST['opcion']) {
    case 1:
      $busqueda = $_POST['nombre'];
      break;

    case 2:
      $busqueda = $_POST['apPaterno'];
      break;

    case 3:
      $busqueda = $_POST['apMaterno'];
      break;
  }

  // echo $busqueda;

  $obj = new LibreriaGetBusqueda();

  $buscar = $obj->getBusqueda($_POST['opcion'],$busqueda);

  if ($buscar == null) {
    echo '<h3 style="color:red;">No hay contactos en la agenda</h3>';
  } else {
    echo '<table class="table table-striped table-bordered">';
    echo '<thead><tr>';
    echo '<th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombre</th><th>Telefono</th><th>Correo</th></tr></thead><tbody>';
    foreach ($buscar as $rows) {
      echo '<tr>';
      echo '<td>'.$rows[2].'</td>';
      echo '<td>'.$rows[3].'</td>';
      echo '<td>'.$rows[1].'</td>';
      echo '<td>'.$rows[4].'</td>';
      echo '<td>'.$rows[5].'</td>';
      echo '</tr>';
    }
    echo '</tbody></table>';
  }
?>
