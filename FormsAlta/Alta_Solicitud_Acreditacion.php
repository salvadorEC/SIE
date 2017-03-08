<?php

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
             <input class="form-control" type="text" name="Matricula_Acreditacion" placeholder="Formato: 01134815">
           </div>
         </div>

         <!-- ############### Version 1.0.1 AJAX APARECER NOMBRE, CARRERA, SEMESTRE, ALUMNO ######## -->

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
