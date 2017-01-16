<?php
    require '../Config/Conexion.php';

    /**
     *
     */
    class LibreriaGetContactos extends Conexion
    {

    private $conexion;

     function __construct()
     {
       $this->conexion = parent::conectar();
       return $this->conexion;
     }

     public function getContactos($user)
     {
       try {
         $query=$this->conexion->prepare("SELECT * FROM `contactos` WHERE `agregado_por` = (?)");
         $query->bindParam(1,$user);
         $query->execute();
         return $query->fetchAll();
       } catch (Exception $e) {
         $e->getMessage();
       }

     }


    }

?>
