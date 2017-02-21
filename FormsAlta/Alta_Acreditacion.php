<?php

 ?>

 <html>
   <head>
     <meta charset="utf-8">
     <title>Alta Acreditaciones</title>
     <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
   </head>
   <body>
     <!--####### TITULO DE LA PAGINA ####### -->
     <div class="jumbotron">
       <h2>Registrar Acreditación</h2>
     </div>
    <!-- ########### F O R M U L A R I O - A L T A - A C R E D I T A C I O N #########-->
     <div class="container">
       <form class="form-horizontal" action="index.html" method="post">

        <div class="row">
          <!--#### No_Lote #### -->
          <label class="control-label col-sm-2">No. Lote</label>
            <div class="col-sm-2">
              <input class="form-control" type="number" name="No_Lote" placeholder="Numero De Lote">
            </div>
             <!--####### No_Oficio ####### -->
          <label class="control-label col-sm-2">No. Oficio </label>
            <div class="col-sm-2">
              <input class="form-control" type="number" name="No_Oficio" placeholder="Numero De Oficio">
           </div>
           <!--####### Periodo ####### -->

          <label class="control-label col-sm-2">Periodo </label>
            <div class="col-sm-2">
              <input class="form-control" type="number" name="Periodo" placeholder="Formato: 2017-1">
            </div>
        </div>
        <br>
         <!--####### Fecha_Acreditacion ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2">Fecha De Acreditación </label>
           <div class="col-sm-10">
             <input class="form-control" type="date" name="Fecha_Acreditacion">
           </div>
         </div>
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
         <!-- ############ Nivel_Acreditacion #######  -->
         <div class="form-group">
           <label class="control-label col-sm-2">Nivel</label>
           <div class="col-sm-10">
             <select class="form-control" name="Nivel_Acreditacion">
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
           <button type="submit" class="btn btn-danger btn-block">Guardar</button>
         </div>
       </div>

       </form>
     </div>
   </body>
 </html>
