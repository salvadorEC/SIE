<?php

  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
  $acentos = $mysqli->query("SET NAMES 'utf8'");

  //##### RECIBIR MATRICULA DE BibliotecaPHP/Alta_Alumno_De_Solicitud_Acreditaciones.php PARA LLENAR EL FORM #####
  $Matricula_Alumno = $_GET['Matricula_Alumno'];
  //Ver al alumno
  $Ver_Alumno = "SELECT * FROM $ALUMNOS WHERE Matricula_Alumno = '".$Matricula_Alumno."' ";
  $Result_Ver_Alumno = $mysqli->query($Ver_Alumno);

  // Guargar en el Array
  $row = $Result_Ver_Alumno->fetch_assoc();
 ?>

 <html>
   <head>
     <meta charset="utf-8">
     <title>Alta Solicitudes Acreditaciones</title>
     <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
   </head>
   <body>
     <!--####### TITULO DE LA PAGINA ####### -->
     <div class="jumbotron">
       <h2>Registrar Solicitudes Acreditación</h2>
       <!-- ########   boton AGREGAR MENU PRINCIPAL ######### -->
       <div class="row">
         <div class="col-sm-offset-1">
           <div class="col-sm-4">
             <a href="../TablasVistas/Acreditaciones.php" class="btn btn-primary"> </i> Menu Principal </a>
           </div>
         </div>
       </div>

     </div>
    <!-- ########### F O R M U L A R I O - A L T A - A C R E D I T A C I O N #########-->
     <div class="container">
       <form class="form-horizontal" action="../BibliotecaPHP/Alta_Solicitudes_Acreditaciones.php" method="post">

        <div class="row">
        <!--####### año ####### -->
           <label class="control-label col-sm-2">Año</label>
             <div class="col-sm-2">
               <input class="form-control" type="text" name="Ano_Acreditacion" value="2017">
             </div>
           <!--####### Periodo ####### -->
          <label class="control-label col-sm-2">Periodo </label>
            <div class="col-sm-2">
              <input class="form-control" type="text" name="Periodo" value="2017-1">
            </div>
        </div>
        <br>
         <!--####### Matricula_Acreditacion ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Matricula Alumno </label>
           <div class="col-sm-10">
             <label class="form-control"><?php echo $row['Matricula_Alumno']?></label>
             <input class="form-control" type="hidden" name="Matricula_Acreditacion" value="<?php echo $row['Matricula_Alumno']?>">
           </div>
         </div>
         <!--####### NOMBRE ALUMNO ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Nombre: </label>
           <div class="col-sm-4">
             <label class="form-control" ><?php echo $row['Nombre_Alumno']?></label>
          </div>
          <!--####### CARRERA ALUMNO####### -->
          <div class="col-sm-4">
            <label class="form-control" ><?php echo $row['Carrera_Alumno']?></label>
         </div>
         <div class="col-sm-2">
           <label class="form-control" >Semestre:  <?php echo $row['Semestre_Alumno']?></label>
        </div>
           </div>

         <!--####### Idioma ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Idioma </label>
           <div class="col-sm-10">
             <select class="form-control" type="text" name="Idioma">
               <option>Inglés</option>
               <option>Italiano</option>
               <option>Alemán</option>
               <option>Francés</option>
               <option>Holandés</option>
               <option>Portugués</option>
               <option>Chino Mandarín </option>
               <option>Chino</option>
             </select>
           </div>
         </div>

        <!--####### NIVEL ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Nivel </label>
           <div class="col-sm-10">
             <select class="form-control" type="text" name="Nivel_Acreditacion">
               <option>Nivel 1</option>
               <option>Nivel 2</option>
               <option>Nivel 3</option>
               <option>Nivel 4</option>
               <option>Nivel 5</option>
               <option>Nivel 6</option>
               <option>Nivel 7</option>
             </select>
           </div>
         </div>

         <!--####### ENTREGA DE DOCS ####### -->
          <div class="form-group">
            <label class="control-label col-sm-2"> Entrego Documentos </label>
            <div class="col-sm-10">
              <select class="form-control" type="text" name="Docs_Acreditacion">
                <option>SI</option>
                <option>NO</option>
              </select>
            </div>
          </div>

       <!-- ######## GUARDAR ####### -->
       <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="btn btn-info btn-block">Guardar</button>
         </div>
       </div>

       </form>
     </div>
   </body>
 </html>
