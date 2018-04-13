<?php
// Incluir configuracion para conectar a la base de datos
include "configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

  //Comprobar la conexion a la base de datos
  if ($mysqli->connect_errno)
  {
    echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

  //Hacer el Query Update a la base de datos .. tabla Alumnos para convertir todos los registros a mayusculas.
  $UpdateAlumno = "UPDATE alumnos SET Nombre_Alumno = UPPER(Nombre_Alumno), Carrera_Alumno = UPPER(Carrera_Alumno) ";
    $Query = $mysqli->query($UpdateAlumno);


?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>MENU SISTEMA IDIOMA EXTRANJERO</title>
     <link rel="stylesheet" href="includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
     <link rel="stylesheet" href="includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
   </head>
   <body>

      <nav>

      </nav>

     <header class="jumbotron">

     </header>


     <section class="container">
       <div class="row">
         <!-- ############################# A L U M N O S #####################-->
           <div class="col-sm-offset-2 col-sm-4">
             <a role="button" href="TablasVistas/Alumnos_agrupados_por_carrera.php" class="btn btn-success btn-lg btn-block"> <i class="fa fa-address-book-o fa-4x" aria-hidden="true"></i> Alumnos </a>
           </div>
           <!-- ############################# E X A M E N E S - D I A G N O S T I CO #####################-->
           <div class="col-sm-4">
             <a role="button" href="TablasVistas/Examenes_diagnostico.php" class="btn btn-primary btn-lg btn-block"> <i class="fa fa-pencil-square-o fa-4x" aria-hidden="true"></i> Examenes Diagnostico </a>
           </div>
          </div>
      <br>
      <div class="row">
        <!-- ############################# ACREDITACIONES #####################-->
        <div class="col-sm-offset-2 col-sm-8">
          <a role="button" href="TablasVistas/Acreditaciones.php" class="btn btn-danger btn-lg btn-block"> <i class="fa fa-bookmark-o fa-4x" aria-hidden="true"></i> Acreditaciones </a>
        </div>
      </div>
      <br>
        <!-- ############################# SITIO WEB #####################-->
  <!--   <div class="row">
      <div class="col-sm-offset-2 col-sm-8">
        <a role="button" href="SITIOS WEB - SIE/Paginas_Principales/Examenes_Diagnostico_Admin.php" class="btn btn-primary btn-lg active col-sm-12"> <img src="SITIOS WEB - SIE/images/logo.png"></a>
      </div>
    </div>
  </section> -->
<br>

     <footer class="jumbotron">

     </footer>

   </body>
 </html>
