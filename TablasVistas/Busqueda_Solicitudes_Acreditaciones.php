<?php
###########################################################################
# Hacer la consulta la base de datos y mostrar el resultado de la busqueda...                           #
###########################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

//RECIBIR LA MATRICULA DE LA ALUMNO COMO PARAMETRO..
$Matricula_Alumno = $_REQUEST['Matricula_Alumno'];


//SELECT TABLA ACREDITACIONES MOSTRAR: Acreditaciones WHERE x Fecha_Acreditacion - Nombre Alumno Ordenado alfabeticamente.

$Ver_Acreditaciones= "SELECT Id_Acreditacion,No_Lote,Ano_Acreditacion,No_Oficio,Periodo,Fecha_Acreditacion,Matricula_Acreditacion,Nombre_Alumno,Idioma,Nivel_Acreditacion,Docs_Acreditacion FROM $ACREDITACIONES JOIN $ALUMNOS ON  Matricula_Alumno = Matricula_Acreditacion  WHERE Matricula_Alumno = '$Matricula_Alumno' and Fecha_Acreditacion=''";

$Result_Ver_Acreditaciones = $mysqli->query($Ver_Acreditaciones);

//Guardar en un Array
$renglon = $Result_Ver_Acreditaciones->fetch_assoc();

//Si no encuentra una solicitud regresar al mismo menu
if ($renglon == "") {
  header('Location:../TablasVistas/Ver_Solicitudes_Acreditaciones.php');
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
      <h2 class="col-sm-offset-2">SOLICITUDES DE ACREDITACIONES</h2>
    </div>
    <!-- ### BOTON REGRESAR AL MENU ACREDITACIONES ###-->
    <div class="row">
      <div class="col-sm-offset-1">
        <a href="../TablasVistas/Ver_Solicitudes_Acreditaciones.php" class="btn btn-danger col-sm-1 "><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
      </div>
      <!-- ##### BUSCADOR POR FECHA y HORA #####-->
          <div class="col-sm-offset-2">
            <form class="form-inline" method="post" action="../TablasVistas/Busqueda_Solicitudes_Acreditaciones.php">
              <input class="form-control" type="number"  name="Matricula_Alumno" placeholder="Matricula Alumno">
              <button class="btn btn-outline-success " type="submit">Buscar</button>
            </form>
          </div>
    </div>
    <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">Año</th>
            <th class="text-center">Periodo</th>
            <th class="text-center">Matricula</th>
            <th class="text-center">Nombre Alumno</th>
            <th class="text-center">Idioma</th>
            <th class="text-center">Nivel A Acreditar</th>
            <th class="text-center">Entrego Docs</th>
            <th class="">Editar</th>

          </tr>
        </thead>
        <tbody>
          <tbody>
            <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
            <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Ano_Acreditacion']?></td>
                <td class="text-center"><?php echo $renglon['Periodo']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Matricula_Acreditacion']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Idioma']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Nivel_Acreditacion']?></td>
                <td class="text-center"><?php echo $renglon['Docs_Acreditacion']?></td>
                <td><a class="btn btn-info " href="../FormsEditar/Solicitudes_Acreditaciones.php?Id_Acreditacion=<?php echo $renglon['Id_Acreditacion'];?>" type="button" name="button"><i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i></a></td>
              </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
          </tbody> <!-- Final Cuerpo de la Tabla de Contabilidad -->
        </tbody>
      </table>
    </div>


  </body>
</html>
