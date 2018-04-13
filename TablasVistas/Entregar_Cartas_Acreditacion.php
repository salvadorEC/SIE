<?php
###########################################################################
# ENTREGAR CARTAS DE ACREDITACIONES                                       #
###########################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

//Comprobar la conexion a la base de datos
if ($mysqli->connect_errno) {
    echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ENTREGAR CARTA DE ACREDITACION</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
    <link rel="stylesheet" href="../includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
  </head>
  <body>

    <div class="jumbotron">
      <h2 class="col-sm-offset-2">ENTREGAR CARTA DE ACREDITACION</h2>
    </div>
    <!-- ### BOTON REGRESAR AL MENU ACREDITACIONES ###-->
    <div class="row">
      <div class="col-sm-offset-1">
        <a href="../TablasVistas/Acreditaciones.php" class="btn btn-danger col-sm-1 "><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
      </div>
      <!-- ##### BUSCADOR POR Matricula_Alumno #####-->
          <div class="col-sm-offset-2">
            <form class="form-inline" method="post" action="../TablasVistas/resultado_entrega_carta_acreditacion.php">
              <input class="form-control" type="number"  name="Matricula_Alumno" placeholder="Matricula Alumno">
              <button class="btn btn-outline-success " type="submit">Buscar</button>
            </form>
          </div>
    </div>
    <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">N0.Lote</th>
            <th class="text-center">Año</th>
            <th class="text-center">Semestre</th>
            <th class="text-center">N0.Oficio</th>
            <th class="text-center">Periodo</th>
            <th class="text-center">Nombre Alumno</th>
            <th class="text-center">Matricula</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">Fecha Acreditación</th>
            <th class="text-center">Idioma</th>
            <th class="text-center">Nivel</th>
            <th class="text-center">Agregar Fecha de Entrega</th>
          </tr>
        </thead>
        <tbody>
          <tbody>

          </tbody>
        </tbody>
      </table>
    </div>


  </body>
</html>
