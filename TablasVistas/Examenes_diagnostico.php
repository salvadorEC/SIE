<?php

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");


//############## E X A M E N E S - D I A G N O S T I C O ################################

$ver_Examenes_D = "SELECT Id_ExamenD,Fecha_ExamenD,Matricula_AlumnoD,Nombre_Alumno,Nivel_ExamenD,No_Recibo_ED FROM $ALUMNOS INNER JOIN $EXAMENES_DIAGNOSTICO ON Matricula_Alumno = Matricula_AlumnoD;";
$Result_Ver_Examenes_D = $mysqli->query($ver_Examenes_D);
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>EXAMENES DIAGNOSTICO</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
    <link rel="stylesheet" href="../includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
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

  <!-- ##### BUSCADOR POR FECHA y HORA #####-->
  <div class="container">
    <div class="row">
      <div class="col-sm-offset-6 col-sm-7">
        <form class="form-inline" method="post" action="../TablasVistas/Busqueda_Examenes_Diagnostico_Para_Editar.php">
          <label class="control-label col-sm-4">Agregar Resultados Del Examen Diagnostico -></label>
          <input class="form-control" type="datetime-local"  name="Fecha_ExamenD">
          <button class="btn btn-outline-success " type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </div>

    <div class="row"> <!-- ####### BOTONES PRINCIPALES Y BUSCADOR ##### -->
      <div class="container">
        <!-- ##### BUSCADOR POR MATRICULA #####-->
          <div class="col-sm-4">
            <form class="form-inline" method="post" action="Busqueda_Examenes_Diagnostico.php">
              <input class="form-control" type="text" placeholder="Matricula" name="Matricula_Alumno">
              <button class="btn btn-outline-success " type="submit">Buscar</button>
            </form>
          </div>
          <!-- ##### BOTON DE AGREGAR EXAMEN DIAGNOSTICO #####-->
          <div class="col-sm-2">
            <a role="button" href="../FormsAlta/Registro_Examen_Diagnostico.php" class="btn btn-primary btn-lg btn-block"> <i class="fa fa-plus-square fa-1px" aria-hidden="true"></i> Agregar</a>
          </div>
          <!-- ##### BOTON MENU PRINCIPAL #####-->
          <div class="col-sm-2">
            <a role="button" href="../index.php" class="btn btn-primary btn-lg btn-block"> Menu Principal</a>
          </div>
          <!-- ##### BOTON GERERAR REPORTES #####-->
          <div class="col-sm-4">
            <a role="button" href="../TablasVistas/Menu_Reportes_Examenes_Diagnostico.php" class="btn btn-danger btn-lg btn-block"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar Reportes</a>
          </div>
      </div>
    </div>

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
              <th class="text-center">No.Recibo</th>
              <th class="text-center"></th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
          <!-- CODIGO PHP - ########## CICLO PARA MOSTRAR LOS REGISTROS DE LOS EXAMENES_DIAGNOSTICO ########-->
            <?php while ( $renglon = mysqli_fetch_array($Result_Ver_Examenes_D)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
                <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
                  <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Id_ExamenD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Fecha_ExamenD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Matricula_AlumnoD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td class="text-center"><?php echo $renglon['Nivel_ExamenD']?></td>
                      <td class="text-center"><?php echo $renglon['No_Recibo_ED']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                      <td><a class="btn btn-primary" role ="button" href="../FormsEditar/Examenes_Diagnostico.php?Id_ExamenD=<?php echo $renglon['Id_ExamenD'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
                      <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Examenes_Diagnostico.php?Id_ExamenD=<?php echo $renglon['Id_ExamenD'];?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo--> <!-- Version 1.0.1 Preguntar si se desea Eliminar el registro .. antes de realizar el Query-->
                    </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <?php }?>
          </tbody>
        </table>
      </div>
    </div>


  </body>
</html>
