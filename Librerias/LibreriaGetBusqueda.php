<?php
  require '../Config/Conexion.php';

  /**
   *
   */
  class LibreriaGetBusqueda extends Conexion
  {

    private $conexion;

    function __construct()
    {
      $this->conexion = parent::conectar();
      return $this->conexion;
    }

    public function getBusqueda($opcion,$busqueda)
    {
      try {
        switch ($opcion) {
          case 1:
            $query=$this->conexion->prepare('SELECT * FROM contactos where nombre LIKE (?) ORDER BY `apellido_pat`');
            $varBus = $busqueda.'%';
            $query->bindParam(1,$varBus, PDO::PARAM_STR);
            break;

          case 2:
            $query=$this->conexion->prepare('SELECT * FROM contactos where `apellido_pat` LIKE (?) ORDER BY `apellido_pat`');
            $varBus = $busqueda.'%';
            $query->bindParam(1,$varBus, PDO::PARAM_STR);
            break;

          case 3:
            $query=$this->conexion->prepare('SELECT * FROM contactos where `apellido_Mat` LIKE (?) ORDER BY `apellido_pat`');
            $varBus = $busqueda.'%';
            $query->bindParam(1,$varBus, PDO::PARAM_STR);
            break;
        }
        $query->execute();
        return $query->fetchAll();
      } catch (PDOException $e) {
        $e->getMessage();
      }
    }

  }

?>
