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
      <!---  ######## FORMULARIO PARA COMENZAR EL REGISTRO DE LOS EXAMANES DIAGNOSTICO ####### --->
      <form class="form-horizontal" action="../BibliotecaPHP/Comprobar_Alta_Examen_Diagnostico.php" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">Matricula</label> <!-- Version 1.0.1 ... mostrar con AJAX el Nombre del alumno para verificar que es el y tambien para verificar que se encuentra en la base de datos-->
          <div class="col-sm-8">
            <input class="form-control" type="number" name="Matricula_De_Comprobacion" placeholder="Ingresar Matricula Del Alumno">
          </div>
        </div>
        <!-- ####### BOTON COMENZAR REGISTRO #####-->
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8"> <!-- Recorrer el boton dos columnas hacia la derecha y ancharlo 6 columnas-->
            <button type="submit" class="btn btn-primary btn-block">Comenzar Registro</button>
          </div>
        </div>
      </form>
    </section>
  </body>
</html>
