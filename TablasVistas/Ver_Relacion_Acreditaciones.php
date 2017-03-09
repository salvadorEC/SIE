<?php
###########################################################################
# Hacer la consulta la base de datos y mostrar todas las acreditaciones en#
# tablas.                                                                 #
###########################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);

//SELECT TABLA ACREDITACIONES

$Ver_Acreditaciones= "SELECT DISTINCT * FROM $ACREDITACIONES ORDER BY Fecha_Acreditacion DESC ";
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
      <h2 class="col-sm-offset-5">ACREDITACIONES</h2>
    </div>


    <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">Matricula</th>
            <th class="text-center">N0.Lote</th>
            <th class="text-center">Periodo</th>
            <th class="text-center">N0.Oficio</th>
            <th class="text-center">Idioma</th>
            <th class="text-center">Nivel</th>
            <th class="text-center">Fecha Acreditacion</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tbody>
            <?php
              while ($renglon = mysqli_fetch_array($Result_Ver_Acreditaciones))
                {
            ?> <!-- Ciclo para sacar los datos del array y para crear filas -->
            <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
            <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Matricula_Acreditacion']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['No_Lote']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Periodo']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['No_Oficio']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Idioma']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Nivel_Acreditacion']?></td>
                <td class="text-center"><?php echo $renglon['Fecha_Acreditacion']?></td>
                <td><a class="btn btn-success" role ="button" href=""> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
                <td><a class="btn btn-danger" role="button" href=""> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
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
