<?php
  require '../Config/Conexion.php';

  /**
   *
   */
  class LibreriaSetContacto extends Conexion
  {

    private $conexion;

    function __construct()
    {
      $this->conexion = parent::conectar();
      return $this->conexion;
    }

    public function setContacto($nombre,$apPaterno,$apMaterno,$telefono,$correo,$user)
    {
      try {
        $query = $this->conexion->prepare("INSERT INTO `contactos`(`id`, `nombre`, `apellido_pat`, `apellido_mat`, `telefono`, `correo`, `agregado_por`) VALUES (NULL, ?, ? , ?, ?, ? , ?)");
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $apPaterno);
        $query->bindParam(3, $apMaterno);
        $query->bindParam(4, $telefono);
        $query->bindParam(5, $correo);
        $query->bindParam(6, $user);
        if ($query->execute()) {
          return 0;
        }else {
          return 1;
        }
      } catch (Exception $e) {
        $e->getMessage();
      }

    }
  }

?>
