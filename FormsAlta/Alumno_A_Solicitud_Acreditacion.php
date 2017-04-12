<?php
  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
  $acentos = $mysqli->query("SET NAMES 'utf8'");

  //Recibir la matricula que se envia desde BibliotecaPHP/Comprobar_Alta_Solicitud_Acreditaciones.php
  $Matricula_De_Comprobacion = $_GET['Matricula_Alumno'];

 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar Alumno</title>
    <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
  </head>
  <body>
    <div class="page-header">
      <h1>Registrar Alumno <small>Dar de alta alumnos en la base de datos</small></h1>
    </div>
    <section class="jumbotron">
      <form class="form-horizontal" action="../BibliotecaPHP/Alta_Alumno_De_Solicitud_Acreditaciones.php" method="post">
        <div class="form-group"> <!--Agrupar Label y El Input-->
          <label class="control-label col-sm-2">Matricula</label> <!--Label-->
          <div class="col-sm-8"> <!--Input-->
            <input class="form-control" type="text" name="Matricula_Alumno" value ="<?php echo $Matricula_De_Comprobacion ?>" placeholder="Ej, 01134815" required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Nombre Completo Del Alumno</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" name="Nombre_Alumno" placeholder="A_Paterno A_Materno Nombre (s)" required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Carrera (Selecciona)</label>
          <div class="col-sm-8">
            <select class="form-control" type="text" name="Carrera_Alumno" required="required">
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
            <select class="form-control" type="number" name="Semestre_Alumno" required="required">
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
