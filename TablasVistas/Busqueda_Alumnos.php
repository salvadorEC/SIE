<?php
  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);

  //Comprobar la conexion a la base de datos
  if ($mysqli->connect_errno) {
      echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

    $Matricula_Alumno = $_REQUEST['Matricula_Alumno'];

    $Ver_Alumno = "SELECT * FROM $ALUMNOS WHERE Matricula_Alumno = '".$Matricula_Alumno."' ";
    $Result_Busqueda_Alumno = $mysqli->query($Ver_Alumno);

 ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>RESULTADO BUSQUEDA ALUMNO</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
  </head>
  <body>
    <header class="jumbotron">
      <h2>Resultado de la busqueda</h2>
    </header>
    <div class="container">
      <div class="row">
        <table class="table table-hover">
          <thead>
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
            <?php while ($renglon = mysqli_fetch_array($Result_Busqueda_Alumno)) { ?> <!-- Ciclo para sacar los datos del array y para crear filas -->
            <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
            <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Id_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Matricula_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td><a class="btn btn-success" role ="button" href="../FormsEditar/Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno']; ?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
                <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno']; ?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
              </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <?php }?>
          </tbody> <!-- Final Cuerpo de la Tabla de Contabilidad -->
        </table>
      </div>
    </div>

  </body>
</html>
