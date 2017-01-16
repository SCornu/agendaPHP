<?php
  require '../Config/Conexion.php';

  /**
   *
   */
  class LogIn extends Conexion
  {

    function __construct()
    {
      # code...
      $this->conexion = parent::conectar();
      return $this->conexion;
    }

    public function getUser($email)
    {
      try {
        $query=$this->conexion->prepare("SELECT * FROM `usuarios` WHERE `email` = (?)");
        $query->bindParam(1,$email);
        $query->execute();
        return $query->fetchAll();
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

?>
