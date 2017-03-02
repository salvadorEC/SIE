<?php
  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);

  //Recibir la matricula que se envia desde BibliotecaPHP/Comprobar_Alta_Examen_Diagnostico.php
  $Matricula_De_Comprobacion = $_GET['Matricula_AlumnoD'];
  //Enviar la matricula al formulario para no volver a escribirla de nuevo ... Se llena todo el FORM en automatico.
  $Ver_Examenes_Diagnostico = "SELECT * FROM $EXAMENES_DIAGNOSTICO WHERE Matricula_AlumnoD = '".$Matricula_De_Comprobacion."' ";
  $Result_Ver_ExamenD = $mysqli->query($Ver_Examenes_Diagnostico);
  //Meter el registro en un array
  $row = $Result_Ver_ExamenD->fetch_assoc();

 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar Examen</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
  </head>
  <body>
    <div class="page-header">
      <h1>Alta Examen Diagnostico <small>Dar de alta examenes diagnostico en la base de datos</small></h1>
    </div>
    <section class="jumbotron">
      <form class="form-horizontal" action="../BibliotecaPHP/Alta_Examenes_Diagnostico_Pago.php" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">Fecha y Hora</label>
          <div class="col-sm-8">
            <input class="form-control"type="datetime-local" name="Fecha_ExamenD">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Matricula</label> <!-- Version 1.0.1 ... mostrar con AJAX el Nombre del alumno para verificar que es el y tambien para verificar que se encuentra en la base de datos-->
          <div class="col-sm-8">
            <input class="form-control" type="number" name="Matricula_AlumnoD" value ="<?php echo $row['Matricula_AlumnoD'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Nivel</label>
          <div class="col-sm-8">
            <select class="form-control" name="Nivel_ExamenD">
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
          <label class="control-label col-sm-2">No. Recibo</label>
          <div class="col-sm-8">
            <input class="form-control" type="number" name="No_Recibo_ED" placeholder="No. Recibo">
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
