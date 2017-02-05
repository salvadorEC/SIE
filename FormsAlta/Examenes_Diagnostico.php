<!DOCTYPE html>
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
      <form class="form-horizontal" action="../BibliotecaPHP/Alta_Examenes_Diagnostico.php" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">Fecha y Hora</label>
          <div class="col-sm-8">
            <input class="form-control"type="datetime-local" name="Fecha_ExamenD">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Matricula</label> <!-- Version 1.0.1 ... mostrar con AJAX el Nombre del alumno para verificar que es el y tambien para verificar que se encuentra en la base de datos-->
          <div class="col-sm-8">
            <input class="form-control" type="number" name="Matricula_AlumnoD" placeholder="Ingresar Matricula Del Alumno">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Nivel</label>
          <div class="col-sm-8">
            <select class="form-control" name="Nivel_ExamenD">
              <option>Solicitud</option>
              <option>Primer</option>
              <option>Segundo</option>
              <option>Tercer</option>
              <option>Cuarto</option>
              <option>Quinto</option>
              <option>Sexto</option>
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
