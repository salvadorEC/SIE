<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SOLICITUD PARA ACREDITACION</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
  </head>
  <body>
    <div class="page-header">
      <h1>Alta Solicitud Para Acreditación <small>Dar de alta solicitudes en la base de datos</small></h1>
      <!-- ########   boton AGREGAR MENU PRINCIPAL ######### -->
      <div class="row">
        <div class="col-sm-offset-1">
          <div class="col-sm-4">
            <a href="../TablasVistas/Acreditaciones.php" class="btn btn-primary"> </i> Menu Principal </a>
          </div>
        </div>
      </div>
    </div>
    <section class="jumbotron">
      <!---  ######## FORMULARIO PARA COMENZAR EL REGISTRO DE LA SOLICITUD DE ACREDITACION PARA COMPROBAR LA MAT.. ####### --->
      <form class="form-horizontal" action="../BibliotecaPHP/Comprobar_Alta_Solicitud_Acreditaciones.php" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2">Matricula</label> <!-- Version 1.0.1 ... mostrar con AJAX el Nombre del alumno para verificar que es el y tambien para verificar que se encuentra en la base de datos-->
          <div class="col-sm-8">
            <input class="form-control" type="number" name="Matricula_De_Comprobacion" placeholder="Ingresar Matricula Del Alumno">
          </div>
        </div>
        <!-- ####### BOTON COMENZAR REGISTRO #####-->
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8"> <!-- Recorrer el boton dos columnas hacia la derecha y ancharlo 6 columnas-->
            <button type="submit" class="btn btn-success btn-block">Comenzar Registro</button>
          </div>
        </div>
      </form>
    </section>
  </body>
</html>
