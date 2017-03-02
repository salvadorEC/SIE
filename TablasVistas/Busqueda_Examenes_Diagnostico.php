<?php

 ##########################################################
 #   BUSCAR EL REGISTRO DEL EXAMEN DIAGNOSTICO EN LA DB   #
 #  LA MATRICULA DEL ALUMNO COMO PARAMETRO...             #
 ##########################################################

  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);

  //Comprobar la conexion a la base de datos
  if ($mysqli->connect_errno) {
      echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

  // Recibir el valor de la matricula del alumno TablasVistas/Examenes_diagnostico.php...
  $Matricula_Alumno = $_REQUEST['Matricula_Alumno'];

  $ver_Examenes_D = "SELECT Id_ExamenD,Fecha_ExamenD,Matricula_AlumnoD,Nombre_Alumno,Nivel_ExamenD,No_Recibo_ED FROM $ALUMNOS INNER JOIN $EXAMENES_DIAGNOSTICO ON Matricula_Alumno = Matricula_AlumnoD WHERE Matricula_Alumno = '".$Matricula_Alumno."';";
  $Result_Ver_Examenes_D = $mysqli->query($ver_Examenes_D);

 ?>

 <html>
   <head>
     <meta charset="utf-8">
     <title>EXAMENES DIAGNOSTICO</title>
     <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
     <link rel="stylesheet" href="../includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
   </head>
   <body>
   <header>
     <nav>

     </nav>
   </header>
   <section>
     <div class="jumbotron">
       <h2>Resultado de la busqueda</h2>
     </div>
   </section>

     <div class="container">
       <div class="row">
         <table class="table table-hover">
           <thead>
             <tr>
               <th class="text-center">#</th>
               <th class="text-center">Fecha y Hora</th>
               <th class="text-center">Matricula</th>
               <th class="text-center">Alumno</th>
               <th class="text-center">Nivel</th>
               <th class="text-center">No. Recibo</th>
               <th class="text-center"></th>
               <th class="text-center"></th>
             </tr>
           </thead>
           <tbody>
           <!-- CODIGO PHP - ########## CICLO PARA MOSTRAR LOS REGISTROS DE LOS EXAMENES_DIAGNOSTICO ########-->
             <?php while ( $renglon = mysqli_fetch_array($Result_Ver_Examenes_D)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
                 <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
                   <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td class="text-center"><?php echo $renglon['Id_ExamenD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td class="text-center"><?php echo $renglon['Fecha_ExamenD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td class="text-center"><?php echo $renglon['Matricula_AlumnoD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td class="text-center"><?php echo $renglon['Nivel_ExamenD']?></td>
                       <td class="text-center"><?php echo $renglon['No_Recibo_ED']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td><a class="btn btn-primary" role ="button" href="../FormsEditar/Examenes_Diagnostico.php?Id_ExamenD=<?php echo $renglon['Id_ExamenD'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
                       <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Examenes_Diagnostico.php?Id_ExamenD=<?php echo $renglon['Id_ExamenD'];?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo--> <!-- Version 1.0.1 Preguntar si se desea Eliminar el registro .. antes de realizar el Query-->
                     </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
               <?php }?>
           </tbody>
         </table>
       </div>
     </div>


   </body>
 </html>
