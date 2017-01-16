<?php
  session_start();
  if(!isset($_SESSION['user']) or $_SESSION['logIn'] != 'ok'){
    header('Location:Procesamiento/Salir.php');
  }

  include '../Librerias/LibreriaGetContactos.php';

  $obj = new LibreriaGetContactos();

  $contactos = $obj->getContactos($_SESSION['user']);

  if ($contactos == null) {
    echo "<h2 style=\"color:#f31304;\">No se tienen contactos registrados.</h2>";
  } else {
    echo "<table class=\"table table-striped table-bordered table-hover table-condensed\">
          <thead>
            <tr>
              <th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombre</th><th>Telefono</th><th>Correo</th>
            </tr>
          </thead>
          <tbody>";
    foreach ($contactos as $key) {
      echo "<tr>";
      echo "<td>".$key[2]."</td>";
      echo "<td>".$key[3]."</td>";
      echo "<td>".$key[1]."</td>";
      echo "<td>".$key[4]."</td>";
      echo "<td>".$key[5]."</td>";
      echo "</tr>";
    }
    echo "</tbody></table>";
  }

?>
