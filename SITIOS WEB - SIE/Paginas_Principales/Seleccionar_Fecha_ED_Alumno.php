<!DOCTYPE html>
<html>
  <head>
    <head>
      <meta charset="utf-8">
      <title>Solicitar Examen Diagnostico</title>
      <link type="text/css" rel="stylesheet" href="../../SITIOS WEB - SIE/Estilos/Solicitar_examenes_diagnostico_alumnos.css">
      <link rel="stylesheet" href="../Includes/bootstrap.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
  </head>
  <body>

    <header class="header">
      <div class="logo-sie">
        <img src="../images/logo.png">
      </div>
      <div class="logo-text">
        <ul>
          <li>SISTEMA</li>
          <li>IDIOMA</li>
          <li>EXTRANJERO</li>
        </ul>
      </div>
      <!-- ##### BOTONES ######-->
      <br>
      <nav id="btns-menu" class="col-sm-offset-10">
        <a href="../../SITIOS WEB - SIE/Paginas_Principales/Solicitar_ExamenD_Alumno.php?mensaje=Bienvenido" type="button" class="btn btn-primary">Actualizar</a>
      </nav>
    </header>

    <section class="container">

      <div class="">
        <img src="../../SITIOS WEB - SIE/images/Fechas_examenes_d.png" class="img-fluid" id="image-fecha" alt="Responsive image">
      </div>

      <div class="header-solicitar">
        <div class="text-solicitar">
          <h1>ELEGIR FECHA</h1>
        </div>
      </div>

      <?php
      //########### BUSCAR ALUMNO #######
      $Matricula_Alumno = $_GET['Matricula_Alumno'];
      // Incluir configuracion para conectar a la base de datos
      include "../../configuracion.php";

      //Conectar a la base de datos
      $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);
      $acentos = $mysqli->query("SET NAMES 'utf8'");

      //VER ALUMNOS DE LA BASE DE DATOS
      $Ver_Alumno = "SELECT * FROM $ALUMNOS  WHERE Matricula_Alumno = '".$Matricula_Alumno."' ";
      $Result_Ver_Alumno = $mysqli->query($Ver_Alumno);

      //Guardar el resultado en un array
      $row = $Result_Ver_Alumno->fetch_assoc();

      //########### BUSCAR FECHAS DISPONIBLES #######
      $Ver_Fechas_Disponibles = "SELECT * FROM $sitio_web_examenes_diagnostico";
      $Result_Ver_Fechas_Disponibles = $mysqli->query($Ver_Fechas_Disponibles);

       ?>

        <div class="body-solicitar">
          <form class="form-horizontal" action="../../BibliotecaPHP/Alta_Examen_Diagnostico_Desde_Sitios_Web.php" method="post">
            <div class="form-group">
              <label class="control-label col-sm-2">Fecha y Hora</label>
              <label class="control-label col-sm-2">AA/MM/DD</label>
              <div class="col-sm-6">
          <!-- ####### IMPUT TIPO OPTION SELECT #######-->
           <select class="form-control" type="text" name="Fecha_ED">
             <!-- ####### CICLO PARA MOSTRAR TODOS LOS CLIENTES REGISTRADOS ####### -->
             <?php while ($option = mysqli_fetch_array($Result_Ver_Fechas_Disponibles)) { ?>
               <!-- ###### MOSTRAR N CANTIDAD DE OPCIONES DEPENDIENDO DE N CANTIDAD DE CLIENTES ######-->
               <option><?php echo $option['Fecha_RegistroED']; ?></option>
             <?php }?>
              </select>
         </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Matricula</label>
              <div class="col-sm-8">
                <label class="form-control"> <?php echo $row['Matricula_Alumno']; ?></label>
                <input class="form-control" type="hidden" name="Matricula_AlumnoD" value ="<?php echo $row['Matricula_Alumno']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Nombre</label>
              <div class="col-sm-8">
                <label class="form-control"> <?php echo $row['Nombre_Alumno']; ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Carrera</label>
              <div class="col-sm-8">
                <label class="form-control"> <?php echo $row['Carrera_Alumno']; ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Semestre</label>
              <div class="col-sm-8">
                <label class="form-control"> <?php echo $row['Semestre_Alumno']; ?></label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Nivel</label>
              <div class="col-sm-8">
                <select class="form-control" name="Nivel_ExamenD">
                  <option>Solicitud</option>
                </select>
                <p>Solicitud: Cuando el alumno solicita hacer el examen, el nivel se registra cuando ya llegan los resultados del examen</p>
              </div>
            </div>
            <!-- ############ NUMERO DE RECIBO EN BLANCO #######-->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8"> <!-- Recorrer el boton dos columnas hacia la derecha y ancharlo 6 columnas-->
                <button type="submit" class="btn btn-danger btn-block">Inscribirme</button>
              </div>
            </div>
          </form>
        </div>
        </section>

    <footer id="footer">


    </footer>

  </body>
</html>
