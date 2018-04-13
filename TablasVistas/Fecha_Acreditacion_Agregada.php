<?php
###########################################################################
# ENTREGAR CARTAS DE ACREDITACIONES                                       #
###########################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

//RECIBIR LA MATRICULA DEL ALUMNO
$Id_Acreditacion = $_REQUEST['Id_Acreditacion'];


//SELECT TABLA ACREDITACIONES MOSTRAR: Acreditaciones WHERE Id_Acreditacion

$Ver_Acreditaciones= "SELECT Id_Acreditacion,No_Lote,Ano_Acreditacion,Semestre_Alumno,No_Oficio,Periodo,Nombre_Alumno,Matricula_Alumno,Carrera_Alumno,Fecha_Acreditacion,Idioma,Nivel_Acreditacion,Fecha_Entrega_Acreditacion FROM $ALUMNOS INNER JOIN $ACREDITACIONES ON  Matricula_Alumno = Matricula_Acreditacion  WHERE Id_Acreditacion = '".$Id_Acreditacion."' and Fecha_Acreditacion is not null  ";

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
    <title>ENTREGAR CARTA DE ACREDITACION</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
    <link rel="stylesheet" href="../includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
  </head>
  <body>

    <div class="jumbotron">
      <h2 class="col-sm-offset-2"></h2>
    </div>
    <!-- ### BOTON REGRESAR ###-->
    <div class="row">
      <div class="col-sm-offset-1">
        <a href="../TablasVistas/Entregar_Cartas_Acreditacion.php" class="btn btn-danger col-sm-1 "><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
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
            <th class="text-center">Fecha de Entrega</th>
          </tr>
        </thead>
        <tbody>
          <tbody>
            <?php

                        // Funcion para tratar/convertir fechas..
                          function multiexplode ($delimiters,$string) {

                              $ready = str_replace($delimiters, $delimiters[0], $string);
                              $launch = explode($delimiters[0], $ready);
                              return  $launch;
                          }

                          $numero = 1;
                          while ($renglon = mysqli_fetch_array($Result_Ver_Acreditaciones))
                            {
                        ?> <!-- Ciclo para sacar los datos del array y para crear filas -->
                        <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
                        <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                            <td class="text-center"><?php echo $numero++; ?></td> <!-- Contar cuantos registros hay-->
                            <td class="text-center"><?php echo $renglon['No_Lote']?></td>
                            <td class="text-center"><?php echo $renglon['Ano_Acreditacion']?></td>
                            <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td>
                            <td class="text-center"><?php echo $renglon['No_Oficio']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                            <td class="text-center"><?php echo $renglon['Periodo']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                            <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                            <td class="text-center"><?php echo $renglon['Matricula_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                            <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td>
                            <td class="text-center"><?php echo $renglon['Fecha_Acreditacion']?></td>
                            <td class="text-center"><?php echo $renglon['Idioma']?></td>
                            <td class="text-center"><?php echo $renglon['Nivel_Acreditacion']?></td>
                            <?php
                            $Fecha_Entrega_Acreditacion = $renglon['Fecha_Entrega_Acreditacion'];
                            $exploded = multiexplode(array("-","T"),$Fecha_Entrega_Acreditacion);
                            ?>
                            <td class="text-center" width="10%" height="10%"><?php echo "$exploded[2]/$exploded[1]/$exploded[0]"; ?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
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
