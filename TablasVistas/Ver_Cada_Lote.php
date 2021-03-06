<?php
###########################################################################
# Hacer la consulta la base de datos y mostrar todas las acreditaciones POR LOTESen#
# tablas.                                                                  #
###########################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

// Funcion para tratar/convertir fechas..
  function multiexplode ($delimiters,$string) {

      $ready = str_replace($delimiters, $delimiters[0], $string);
      $launch = explode($delimiters[0], $ready);
      return  $launch;
  }



$Fecha_Por_Lote = $_GET['Fecha_Acreditacion'];

//SELECT TABLA ACREDITACIONES MOSTRAR: Acreditaciones WHERE x Fecha_Acreditacion - Nombre Alumno Ordenado alfabeticamente.

$Ver_Acreditaciones= "SELECT Id_Acreditacion,No_Lote,Ano_Acreditacion,No_Oficio,Periodo,Fecha_Acreditacion,Matricula_Acreditacion,Nombre_Alumno,Idioma,Nivel_Acreditacion FROM $ACREDITACIONES JOIN $ALUMNOS ON  Matricula_Alumno = Matricula_Acreditacion  WHERE Fecha_Acreditacion = '$Fecha_Por_Lote' ORDER BY Nombre_Alumno ASC  ";

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="jumbotron">
      <?php   $exploded = multiexplode(array("-","T"),$Fecha_Por_Lote); ?>
      <h2 class="col-sm-offset-2">ACREDITACIONES DE LA FECHA: <?php echo "$exploded[2]/$exploded[1]/$exploded[0]"; ?></h2>
    </div>
    <!-- ### BOTON REGRESAR AL MENU ACREDITACIONES ###-->
    <div class="row">
      <div class="col-sm-offset-1">
        <a href="../TablasVistas/Preparar_Acreditaciones.php" class="btn btn-primary col-sm-1 "><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
      </div>
      <!-- ### BOTON IMPRIMIR TODOS LOS REGISTROS ###-->
        <div class="col-sm-offset-5">
          <a href="../ReportesPDF/Lote_Acreditaciones_Completo.php?Fecha_Acreditacion=<?php echo $Fecha_Por_Lote; ?>" target="_blank" class="btn btn-default col-sm-4 "><i class="fa fa-print fa-2x" aria-hidden="true"></i></a>
        </div>
    </div>

    <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">N0.Lote</th>
            <th class="text-center">Periodo</th>
            <th class="text-center">N0.Oficio</th>
            <th class="text-center">Matricula</th>
            <th class="text-center">Nombre Alumno</th>
            <th class="text-center">Idioma</th>
            <th class="text-center">Nivel</th>
            <th class="text-center">Fecha Acreditacion</th>
            <th class="text-center">Eliminar</th>
            <th></th>
            <th class="text-center">Imprimir</th>
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
                <td class="text-center"><?php echo $numero ++;?></td> <!-- Contar cuantos registros hay-->
                <td class="text-center"><?php echo $renglon['No_Lote']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Periodo']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['No_Oficio']?><!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Matricula_Acreditacion']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Idioma']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Nivel_Acreditacion']?></td>

                <?php
                $Fecha_Acreditacion = $renglon['Fecha_Acreditacion'];
                $exploded = multiexplode(array("-","T"),$Fecha_Acreditacion);
                 ?>
                <td class="text-center"><?php echo "$exploded[2]/$exploded[1]/$exploded[0]"; ?></td>
                <td><a onclick="return confirmSubmit()" href="../BibliotecaPHP/Eliminar_Acreditacion.php?Id_Acreditacion=<?php echo $renglon['Id_Acreditacion']; ?>&Fecha_Acreditacion=<?php echo $Fecha_Por_Lote; ?>" class="btn btn-danger btn-lg btn-block"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                <td><a href="../FormsEditar/Acreditaciones.php?Id_Acreditacion=<?php echo $renglon['Id_Acreditacion']; ?>" class="btn btn-default btn-lg btn-block"> Editar</a></td>
                <td><a href="../ReportesPDF/Lote_Acreditaciones.php?Id_Acreditacion=<?php echo $renglon['Id_Acreditacion']; ?>" target="_blank" class="btn btn-default btn-lg btn-block"> <i class="fa fa-print" aria-hidden="true"></i></a></td>
              </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <?php
                }
            ?>
            <script type="text/javascript">
                  function confirmSubmit()
                    {
                      var agree=confirm("Está seguro de eliminar este registro? Este proceso es irreversible.");
                        if (agree)
                          return true ;
                        else
                          return false ;
                    }
           </script>
          </tbody> <!-- Final Cuerpo de la Tabla de Contabilidad -->
        </tbody>
      </table>
    </div>


  </body>
</html>
