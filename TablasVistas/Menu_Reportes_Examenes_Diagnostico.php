<?php

 ###########################################################
 #    MENU PARA GENERAR REPORTES DE EXAMENES DIAGNOSTICO   #
 #    SE MUESTRA UN MENU CON LA  OPCION                    #
 #      1. PARA GENERAR UNA SOLICITUD (SIN NIVEL)          #
 #                                                         #
 ###########################################################


 ?>

 <html>
   <head>
     <meta charset="utf-8">
       <title> MENU REPORTES EXAMEN DIAGNOSTICO </title>
       <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
       <link rel="stylesheet" href="../includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
   </head>
   <body>

     <div class="jumbotron">
       <h2>GENERAR REPORTES</h2>
     </div>

     <div class="container">
       <div class="form-group"> <!--Agrupar Label y El Input-->
         <!-- ##### BUSCADOR POR FECHA y HORA PARA GENERAR LA SOLICITUD PARA LA FACULTAD DE IDIOMAS #####-->
         <form class="form-inline" method="post" action="../TablasVistas/Preparar_Solicitud_A_Facultad_De_Idiomas_Examen_Diagnostico.php">
           <label class="control-label col-sm-3"> Generar Solicitud a Facultad de Idiomas </label> <!--Label-->
             <div class="col-sm-8"> <!--Input-->
               <input class="form-control" type="datetime-local" name="Fecha_ExamenD" placeholder="Fecha y Hora" required="required">
               <button class="btn btn-outline-success " type="submit">Buscar</button>
             </div>
         </form>
       </div>
      </div>

   </body>
 </html>
