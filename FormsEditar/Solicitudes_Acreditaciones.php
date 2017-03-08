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

        //Conseguir id Acreditacion TablasVistas/Ver_Solicitudes_Acreditaciones.php
        $Id_Acreditacion = $_GET['Id_Acreditacion'];

        //SELECT TABLA ACREDITACIONES MOSTRAR: Acreditaciones WHERE x Fecha_Acreditacion - Nombre Alumno Ordenado alfabeticamente.
        $Ver_Acreditaciones= "SELECT * FROM $ACREDITACIONES WHERE Id_Acreditacion = '$Id_Acreditacion' ";
        $Result_Ver_Acreditaciones = $mysqli->query($Ver_Acreditaciones);

        //Guardar el resiultado en un array
        $row = $Result_Ver_Acreditaciones->fetch_assoc();

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
     </div>
    <!-- ########### F O R M U L A R I O - A L T A - A C R E D I T A C I O N #########-->
     <div class="container">
       <form class="form-horizontal" action="../BibliotecaPHP/Update_Acreditaciones_De_Editar_Solicitudes_Acreditaciones.php" method="post">

         <!--####### Id_Acreditacion OCULTO ####### -->
         <div class="col-sm-2">
            <input type="hidden" name="Id_Acreditacion" value="<?php echo $row['Id_Acreditacion'] ?>">
         </div>
        <div class="row">
        <!--####### año ####### -->
           <label class="control-label col-sm-2">Año</label>
             <div class="col-sm-2">
               <input class="form-control" type="text" name="Ano_Acreditacion" value="<?php echo $row['Ano_Acreditacion'] ?>">
             </div>
           <!--####### Periodo ####### -->
          <label class="control-label col-sm-2">Periodo </label>
            <div class="col-sm-2">
              <input class="form-control" type="text" name="Periodo" value="<?php echo $row['Periodo'] ?>">
            </div>
        </div>
        <br>
         <!--####### Matricula_Acreditacion ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Matricula Alumno </label>
           <div class="col-sm-10">
             <label class="form-control"><?php echo $row['Matricula_Acreditacion'] ?></label>
             <input type="hidden" name="Matricula_Acreditacion" value="<?php echo $row['Matricula_Acreditacion'] ?>">
           </div>
         </div>

         <!-- ############### Version 1.0.1 AJAX APARECER NOMBRE, CARRERA, SEMESTRE, ALUMNO ######## -->

         <!--####### Idioma ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Idioma </label>
           <div class="col-sm-10">
             <select class="form-control" type="text" name="Idioma">
               <option><?php echo $row['Idioma'] ?></option>
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

         <!--####### ENTREGA DE DOCS ####### -->
          <div class="form-group">
            <label class="control-label col-sm-2"> Entrego Documentos </label>
            <div class="col-sm-10">
              <select class="form-control" type="text" name="Docs_Acreditacion">
                <option><?php echo $row['Docs_Acreditacion'] ?></option>
                <option>SI</option>
                <option>NO</option>
              </select>
            </div>
          </div>

        <!--####### NIVEL ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Nivel </label>
           <div class="col-sm-10">
             <select class="form-control" type="text" name="Nivel_Acreditacion">
               <option><?php echo $row['Nivel_Acreditacion'] ?></option>
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
