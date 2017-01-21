<?php
  session_start();
  if(!isset($_SESSION['user']) or $_SESSION['logIn'] != 'ok'){
    header('Location:Procesamiento/Salir.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agenda</title>
    <script src="public/js/jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <script src="public/js/bootstrap.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h2>Menu Agenda</h2>
        <div class="col-xs-12 col-sm-6 col-md-8">
          <button type="button" id="verContactos" name="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
            Ver contactos
          </button>
          <button type="button" id="bucarContacto" name="button" class="btn btn-warning">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            Buscar Contacto
          </button>
          <button type="button" id="agregarContacto" name="button" class="btn btn-success">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            Agregar Contacto
          </button>
          <button type="button" id="borrarContacto" name="button" class="btn btn-danger">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            Borrar Contacto
          </button>
        </div>
        <div class="col-xs-6 col-md-4">
          <button type="button" id="salir" name="button" class="btn btn-default">
            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
            Salir
          </button>
        </div>
      </div>
      <div class="row" style="margin-top:1.5em;">
        <div class="resultado col-md-10"></div>
      </div>
      <!--Modal-->
      <div id="modalAgenda" class="modal fade" role="dialog"></div>
    </div>
  </body>
  <script>
    $('#verContactos').on('click', function(e){
      e.preventDefault();
      verContactos();
    });
    $('#agregarContacto').on('click', function (e) {
      e.preventDefault();
      console.log('se preciono el boton de agregar');
      $('#modalAgenda').modal().load('public/Modals/modalContacto.html');
    });
    $('#bucarContacto').on('click', function (e){
      $('#modalAgenda').modal().load('public/Modals/modalBusqueda.html');
    });
    $('#borrarContacto').on('click', function (e) {
      e.preventDefault();
      $('#modalAgenda').modal().load('public/Modals/modalBorrar.html');
    })

    function verContactos() {
      $.get('Procesamiento/getContactos.php').done(function (echo) {
        $('.resultado').html(echo);
      })
    }
  </script>
</html>
