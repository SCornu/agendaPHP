<?php
  require '../Config/Conexion.php';

  class registro extends Conexion{

    private $conexion;

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

   public function setUser($user,$email,$pass)
   {
     $passHash = password_hash($pass, PASSWORD_DEFAULT);
     $opciones = ['cost' => 12,];
    //  $passHash = password_hash($pass,PASSWORD_BCRYPT, $opciones);
     $passHash = password_hash($pass,PASSWORD_DEFAULT, $opciones);
     try {
       $query=$this->conexion->prepare("INSERT INTO `usuarios` (`id`, `nombre`, `email`, `pass`) VALUES (NULL, ?, ?, ?);");
       $query->bindParam(1,$user);
       $query->bindParam(2,$email);
       $query->bindParam(3,$passHash);
       if($query->execute()){
         return 0;
       }else{
         return 1;
       }
     } catch (PDOException $e) {
       $e->getMessage();
     }

   }

  }
?>
