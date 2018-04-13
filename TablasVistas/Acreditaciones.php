<?php
// ####### MENU PRINCIPAL ACREDITACIONES #########

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Acreditaciones</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
    <link rel="stylesheet" href="../includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
  </head>
  <body>

    <div class="jumbotron">
      <h2 class="col-sm-offset-4">ACREDITACIONES</h2>
    </div>

      <!-- ########   boton AGREGAR MENU PRINCIPAL ######### -->
      <div class="row">
        <div class="col-sm-offset-4">
          <div class="col-sm-4">
            <a href="../index.php" class="btn btn-primary btn-lg btn-block"> </i> Menu Principal </a>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
      <!-- ########   boton AGREGAR Solicitudes_Acreditaciones ######### -->
      <div class="col-sm-offset-2">
        <div class="col-sm-4 ">
          <a href="../FormsAlta/Registro_Solicitud_Acreditacion.php" class="btn btn-success btn-lg btn-block"> <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i> Nueva Solicitud</a>
        </div>
      </div>
     <!-- ##### BOTON PARA ACCEDER A LOTES DE ACREDITACIONES Y GENERAR NUEVOS LOTES ##### -->
      <div class="col-sm-offset-4">
        <div class="col-sm-6">
          <a href="../TablasVistas/Preparar_Acreditaciones.php" class="btn btn-danger btn-lg btn-block "> <i class="fa fa-graduation-cap fa-4x" aria-hidden="true"></i> Acreditaciones</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
       <!-- ##### BOTON PARA ENTREGAR CARTAS DE ACREDITACIONES ##### -->
       <div class="col-sm-offset-2">
         <div class="col-sm-4">
           <a href="../TablasVistas/Entregar_Cartas_Acreditacion.php" class="btn btn-default btn-lg btn-block"> <i class="fa fa-handshake-o fa-4x" aria-hidden="true"></i></i> Entregar Carta Acre.</a>
         </div>
       </div>
      <!-- ##### BOTON PARA ACCEDER A LOTES DE ACREDITACIONES Y GENERAR NUEVOS LOTES #####
       <div class="col-sm-offset-2">
         <div class="col-sm-4">
           <a href="../TablasVistas/Ver_Relacion_Acreditaciones.php" class="btn btn-default btn-lg btn-block"> <i class="fa fa-database fa-4x" aria-hidden="true"></i> Relacion Acreditaciones</a>
         </div>
       </div>-->
       <!-- ##### BOTON PARA VER SOLICITUDES_ACREDITACIONES PENDIENTES Y YA REALIZADAS ##### -->
        <div class="col-sm-offset-4">
          <div class="col-sm-6">
            <a href="../TablasVistas/Ver_Solicitudes_Acreditaciones.php" class="btn btn-success btn-lg btn-block"> <i class="fa fa-calendar-check-o fa-4x" aria-hidden="true"></i> Ver Solicitudes Acreditaciones</a>
          </div>
        </div>
   </div>

  </body>
</html>
