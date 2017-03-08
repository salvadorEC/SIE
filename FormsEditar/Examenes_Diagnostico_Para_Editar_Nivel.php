<?php
  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
  $acentos = $mysqli->query("SET NAMES 'utf8'");

    //Comprobar la conexion a la base de datos
    if ($mysqli->connect_errno)
    {
      echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

  // Conseguir la matricula al momento de hacer clic en Editar...
  $Id_ExamenD = $_GET['Id_ExamenD'];

    //Realizar la consulta a la base de datos SIE
    $Ver_ExamenD = "SELECT * FROM $EXAMENES_DIAGNOSTICO WHERE Id_ExamenD = '".$Id_ExamenD."'";
    $Result_ver_examen_d = $mysqli->query($Ver_ExamenD);

  //Guardar el resultado en un array
  $row = $Result_ver_examen_d->fetch_assoc();

?>

<html>

  <head>
    <meta charset="utf-8">
    <title>Registrar Examen</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
  </head>

  <body>
    <div class="page-header">
      <h1>Editar Exmanen Diagnostico <small>Editar este registro en la base de datos... </small></h1>
    </div>
    <section class="jumbotron">

      <!-- ####### F O R M U L A R I O - E X A M E N E S - EDITAR ########## -->
      <form class="form-horizontal" action="../BibliotecaPHP/Update_Examenes_Diagnostico_Editar_Nivel.php" method="post">
      <!-- ###### ID Examen OCULTO #####-->
        <div class="form-group">
          <input type="hidden" name="Id_ExamenD" value="<?php echo $row['Id_ExamenD']?>"> <!-- INPUT OCULTO-->
        </div>
          <!-- ###### FECHA Y HORA - APARECE SIN PODER EDITAR #####-->
        <div class="form-group">
          <label class="control-label col-sm-4">Fecha y Hora: <?php echo $row['Fecha_ExamenD']?></label>
          <input type="hidden" name="Fecha_ExamenD" value="<?php echo $row['Fecha_ExamenD']?>">
        </div>
        <!-- ###### MATRICULA - APARECE SIN PODER EDITAR #####-->
        <div class="form-group">
          <label class="control-label col-sm-4"> Matricula: <?php echo $row['Matricula_AlumnoD']?></label> <!-- Version 1.0.1 ... Con AJAX mostrar el nomnbre y matricula del alumno-->
          <input type="hidden" name="Matricula_AlumnoD" value="<?php echo $row['Matricula_AlumnoD']?>">
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Nivel</label>
          <div class="col-sm-8">
            <select class="form-control" name="Nivel_ExamenD">
              <option><?php echo $row['Nivel_ExamenD']?></option> <!-- Version 1.0.1 Evitar que se repita la opcion-->
              <option>Solicitud</option>
              <option>Nivel 1</option>
              <option>Nivel 2</option>
              <option>Nivel 3</option>
              <option>Nivel 4</option>
              <option>Nivel 5</option>
              <option>Nivel 6</option>
              <option>Nivel 7</option>
            </select>
            <p>Solicitud: Cuando el alumno solicita hacer el examen, el nivel se registra cuando ya llegan los resultados del examen</p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8"> <!-- Recorrer el boton dos columnas hacia la derecha y ancharlo 6 columnas-->
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
          </div>
        </div>
      </form>
    </section>
  </body>
</html>
