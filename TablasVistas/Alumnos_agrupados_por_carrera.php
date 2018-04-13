<?php

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

//VER ALUMNOS DE LA BASE DE DATOS
$Ver_Alumnos = "SELECT * FROM $ALUMNOS ";
$Result_Ver_Alumnos = $mysqli->query($Ver_Alumnos);

  //Comprobar la conexion a la base de datos
  if ($mysqli->connect_errno) {
      echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alumnos</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
    <link rel="stylesheet" href="../includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
  </head>
              <!-- Version 1.0.1 ... Crear un menu con botones para mostrar cada carrera en tablas diferentes -->
  <body>  <!-- Cuerpo de la pagina-->

    <div class="container"> <!-- Centrar todas las tablas AJUSTAR-->
        <div class="page-header">  <!-- Encabezado Ajustado-->
          <h1>ALUMNOS<small> Agrupados por carrera</small></h1>
        </div>
        <div class="row">
          <!-- ##### BUSCADOR POR MATRICULA #####-->
            <div class="col-sm-4">
              <form class="form-inline" method="post" action="Busqueda_Alumnos.php">
                <input class="form-control" type="text" placeholder="Matricula" name="Matricula_Alumno">
                <button class="btn btn-outline-success " type="submit">Buscar</button>
              </form>
            </div>
            <!-- ##### BOTON AGREGAR ALUMNO #####-->
            <div class="col-sm-2">
              <a role="button" href="../FormsAlta/Alumnos.php" class="btn btn-success btn-lg btn-block"> <i class="fa fa-user-plus fa-1x" aria-hidden="true"></i></a>
            </div>
            <!-- ##### BOTON MENU PRINCIPAL #####-->
            <div class="col-sm-2">
              <a role="button" href="../index.php" class="btn btn-primary btn-lg btn-block"> Menu Principal</a>
            </div>
        </div>
        <br>
 <!-- ################ TABLA A L U M N O S ############################-->
    <div class="row"> <!-- Ajustar-->
      <table class="table table-hover"> <!-- Tabla con efecto al pasar el mouse sobre un registro-->
        <thead>
          <tr>
            <th class="bg-success" colspan="7">ALUMNOS</th>
          </tr>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Matricula</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">Semestre</th>
            <th class="text-center"></th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody> <!-- Inicio Cuerpo de la Tabla de Contabilidad -->
          <!-- CODIGO PHP CON CODIGO HTML-->
          <?php
            $numero = 1;
            while ($renglon = mysqli_fetch_array($Result_Ver_Alumnos)){

            ?> <!-- Ciclo para sacar los datos del array y para crear filas -->
          <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
          <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td class="text-center"><?php echo $numero++;?></td>
              <td class="text-center"><?php echo $renglon['Matricula_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td><a class="btn btn-success" role ="button" href="../FormsEditar/Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno']; ?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
              <!-- <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Alumnos.php?Matricula_Alumno=<?//php echo $renglon['Matricula_Alumno']; ?>"> Eliminar</a></td> --> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
            </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <?php
          }?>
        </tbody> <!-- Final Cuerpo de la Tabla de Contabilidad -->
        <thead> <!-- Inicio Cabecera para dividir la tabla de la otra tabla-->
          <tr>
            <th class="bg-success" colspan="7"></th>
          </tr>
        </thead> <!-- Final Cabecera para dividir la tabla de la otra tabla-->
      </table>
    </div>
  </div> <!-- Container -->
  </body>
</html>
