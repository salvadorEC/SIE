<?php
###########################################################################
# Hacer la consulta la base de datos y mostrar todas las acreditaciones en#
# tablas.                                                                 #
###########################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

//SELECT TABLA ACREDITACIONES

$Ver_Acreditaciones= "SELECT * FROM $ACREDITACIONES INNER JOIN $ALUMNOS ON Matricula_Acreditacion = Matricula_Alumno ORDER BY Ano_Acreditacion DESC ";
$Result_Ver_Acreditaciones = $mysqli->query($Ver_Acreditaciones);


//Comprobar la conexion a la base de datos
if ($mysqli->connect_errno) {
    echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

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
      <h2 class="col-sm-offset-4">RELACION ACREDITACIONES</h2>
    </div>
    <!-- ########   BOTON GENERAR EXCEL ######### -->
    <div class="row">
      <div class="col-sm-offset-4">
        <div class="col-sm-5">
          <a href="../ReportesExcel/Relacion_Acreditaciones.php" class="btn btn-success btn-lg btn-block"> <i class="fa fa-download" aria-hidden="true"></i> Generar Excel</a>
        </div>
      </div>
    </div>

    <div class="container">
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
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tbody>
              <?php
                $numero = 1;
                while ($renglon = mysqli_fetch_array($Result_Ver_Acreditaciones))
                  {
              ?> <!-- Ciclo para sacar los datos del array y para crear filas -->
              <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
              <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $numero++; ?></td>
                  <td class="text-center"><?php echo $renglon['No_Lote']?></td>
                  <td class="text-center"><?php echo $renglon['Ano_Acreditacion']?></td>
                  <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td>
                  <td class="text-center"><?php echo $renglon['No_Oficio']?></td>
                  <td class="text-center"><?php echo $renglon['Periodo']?></td>
                  <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Matricula_Acreditacion']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Fecha_Acreditacion']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Idioma']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Nivel_Acreditacion']?></td>
                </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <?php
                  }
              ?>
            </tbody> <!-- Final Cuerpo de la Tabla de Contabilidad -->
          </tbody>
        </table>
    </div>


  </body>
</html>
