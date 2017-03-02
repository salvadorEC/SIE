<?php
  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);

    //Comprobar la conexion a la base de datos
    if ($mysqli->connect_errno)
    {
      echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
      else
        {
          // Conseguir la matricula al momento de hacer clic en Editar...
          $mat = $_GET['Matricula_Alumno'];

            //Realizar la consulta a la base de datos SIE
            $Ver_Alumno = "SELECT * FROM $ALUMNOS WHERE Matricula_Alumno = '".$mat."'";
            $Result_ver_alumno = $mysqli->query($Ver_Alumno);

          //Guardar el resiultado en un array
          $row = $Result_ver_alumno->fetch_assoc();


      }
   ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar Alumno</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
  </head>
  <body>
    <div class="page-header">
      <h1>Editar Alumno <small>Editar este registro en la base de datos...</small></h1>
    </div>
    <section class="jumbotron">
      <form class="form-horizontal" action="../BibliotecaPHP/Update_Alumnos.php" method="post">
        <div class="form-group"> <!--Agrupar Label y El Input-->
          <input type="hidden" name="Id_Alumno" value="<?php echo $row['Id_Alumno']?>"> <!-- INPUT INVISIBLE-->
          <label class="control-label col-sm-2">Matricula</label> <!--Label-->
          <div class="col-sm-8"> <!--Input-->
            <input class="form-control" type="text" name="Matricula_Alumno" value="<?php echo $row['Matricula_Alumno']?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Nombre Completo Del Alumno</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" name="Nombre_Alumno" value="<?php echo $row['Nombre_Alumno']?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Carrera (Selecciona)</label>
          <div class="col-sm-8">
            <select class="form-control" type="text" name="Carrera_Alumno">
              <option><?php echo $row['Carrera_Alumno'] ?></option> <!-- Muestra la carrera actual del alumno--> <!--version 1.0.1 no mostrar repetida la opcion -->
              <option>Tronco Común</option>
              <option>Licenciado en Contaduría</option>
              <option>Licenciado en Administración de Empresas</option>
              <option>Licenciado en Mercadotecnia</option>
              <option>Licenciado en Gestión Turística</option>
              <option>Licenciado en Negocios Internacionales</option>
              <option>Licenciado en Informática</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Semestre</label>
          <div class="col-sm-8">
            <select class="form-control" type="number" name="Semestre_Alumno" >
              <option><?php echo $row['Semestre_Alumno']; ?> </option> <!-- Muestra el smestre actual del alumno--> <!--version 1.0.1 no mostrar repetida la opcion -->
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8"> <!-- Recorrer el boton dos columnas hacia la derecha y ancharlo 6 columnas-->
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
          </div>
        </div>
      </form>
    </section>
  </body>
</html>
