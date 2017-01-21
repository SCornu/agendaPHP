<?php
  require '../Config/Conexion.php';

  /**
   *
   */
  class LibreriaBorrar extends Conexion
  {

    private $conexion;

    function __construct()
    {
      $this->conexion = parent::conectar();
      return $this->conexion;
    }

    public function borrar($nombre, $apPaterno, $apMaterno, $user)
    {
      try {
        $query=$this->conexion->prepare("DELETE FROM `contactos` WHERE `nombre` = (?) AND `apellido_pat` = (?) AND `apellido_mat` = (?) AND `agregado_por` = (?)");
        $query->bindParam(1,$nombre);
        $query->bindParam(2,$apPaterno);
        $query->bindParam(3,$apMaterno);
        $query->bindParam(4,$user);
        if($query->execute()){
          return 0;
        }else {
          return 1;
        }
      } catch (PDOException $e) {
        $e->getMessage();
      }

    }
  }

?>
