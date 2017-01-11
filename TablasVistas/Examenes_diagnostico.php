<?php

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);

//############## E X A M E N E S - D I A G N O S T I C O ################################

$ver_Examenes_D = "SELECT Id_ExamenD,Fecha_ExamenD,Matricula_AlumnoD,Nombre_Alumno,Nivel_ExamenD FROM ALUMNOS INNER JOIN EXAMENES_DIAGNOSTICO ON Id_ExamenD = Matricula_Alumno;";
$Result_Ver_Examenes_D = $mysqli->query($ver_Examenes_D);
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>EXAMENES DIAGNOSTICO</title>
    <link rel="stylesheet" href="../css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
    <link rel="stylesheet" href="../css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
  </head>
  <body>
  <header>
    <nav>

    </nav>
  </header>
  <section>
    <div class="jumbotron">

    </div>
  </section>
    <div class="container">
      <div class="row">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Fecha y Hora</th>
              <th class="text-center">Matricula</th>
              <th class="text-center">Alumno</th>
              <th class="text-center">Nivel</th>
              <th class="text-center"></th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
          <!-- CODIGO PHP - ########## CICLO PARA MOSTRAR LOS DATOS ########-->
            <?php while ( $renglon = mysqli_fetch_array($Result_Ver_Examenes_D)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
                <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
                  <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Id_ExamenD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Fecha_ExamenD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Matricula_AlumnoD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Nivel_ExamenD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td><a class="btn btn-primary" role ="button" href="../FormsEditar/Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
                      <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
                    </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <?php }?>
          </tbody>
        </table>
      </div>
    </div>


  </body>
</html>
