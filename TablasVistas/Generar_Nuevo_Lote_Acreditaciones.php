<?php
###########################################################################
# Hacer la consulta la base de datos y mostrar todas las Solicitudes acreditaciones en#
# tablas.                                                                 #
###########################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

//SELECT TABLA SOLICITUDES_ACREDITACIONES

$Ver_Solicitudes_Acreditaciones= "SELECT * FROM $ACREDITACIONES INNER JOIN $ALUMNOS ON Matricula_Acreditacion = Matricula_Alumno WHERE Docs_Acreditacion = 'SI' AND Fecha_Acreditacion = '' ";
$Result_Ver_Solicitudes_Acreditaciones = $mysqli->query($Ver_Solicitudes_Acreditaciones);


//Comprobar la conexion a la base de datos
if ($mysqli->connect_errno) {
    echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SOLICITUDES DE ACREDITACIONES</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
    <link rel="stylesheet" href="../includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
  </head>
  <body>

    <div class="jumbotron">
      <h2 class="col-sm-offset-3">GENERAR NUEVO LOTE</h2>
    </div>
    <!-- ######### BOTON VER LOTES #######-->
    <div class="row">
      <div class="col-sm-offset-1">
        <a href="../TablasVistas/Preparar_Acreditaciones.php" class="btn btn-primary col-sm-1 ">Ver LOTES</a>
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
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tbody>
            <?php
              $numero = 1;
              while ($renglon = mysqli_fetch_array($Result_Ver_Solicitudes_Acreditaciones))
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
                <td><a class="btn btn-info" href="../FormsEditar/Lote_Listo_Para_Acreditacion.php?Id_Acreditacion=<?php echo $renglon['Id_Acreditacion'];?>" type="button" name="button"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i></a></td>
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
