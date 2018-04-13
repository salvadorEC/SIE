<?php

 #####################################################################################################################
 #   BUSCAR EL REGISTRO DEL EXAMEN DIAGNOSTICO EN LA DB                                                              #
 #  LA FECHA Y HORA DEL EXAMEN COMO PARAMETRO                                                                        #
 # AQUI YA ESTAN EDITANDO LOS REGISTROS CADA VEZ QUE SE EDITA UN REGISTRO                                             #
 # CADA VEZ QUE SE LE AGREGA EL NIVEL. SE HACE UNA CONSULTA PARA MOSTRAR                                              #
 # LOS REGISTROS QUE YA SE EDITARON.  Y ASI NO PERDER EL CONTROL SOBRE LO QUE SE ESTA EDITANDO (NIVEL)...             #
 #####################################################################################################################

  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);
  $acentos = $mysqli->query("SET NAMES 'utf8'");

  //Comprobar la conexion a la base de datos
  if ($mysqli->connect_errno) {
      echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  // Funcion para tratar/convertir fechas..
    function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }

  // Recibir el valor de la fecha examen diagnostico del url. de la direccion BibliotecaPHP/Update_Examenes_Diagnostico_Editar_Nivel.php
  $Fecha_ExamenD = $_GET['Fecha_ExamenD'];
  //Hacer la consulta a la base de datos usando como parametro le Fecha_ExamenD.
  $ver_Examenes_D = "SELECT Id_ExamenD,Fecha_ExamenD,Matricula_AlumnoD,Nombre_Alumno,Nivel_ExamenD,No_Recibo_ED FROM $ALUMNOS INNER JOIN $EXAMENES_DIAGNOSTICO ON Matricula_Alumno = Matricula_AlumnoD WHERE Fecha_ExamenD = '".$Fecha_ExamenD."';";
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
       <?php $exploded = multiexplode(array("-","T"),$Fecha_ExamenD); ?>
       <h2>EDITAR NIVELES LOTE FECHA: <? echo "$exploded[2]/$exploded[1]/$exploded[0] Hora: $exploded[3]";?></h2>
     </div>
     <!-- ##### BOTON TABLA VISTAS REGRESAR  #####-->
     <div class=" col-sm-2">
       <a role="button" href="../TablasVistas/Examenes_diagnostico.php" class="btn btn-primary"> REGRESAR</a>
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
             </tr>
           </thead>
           <tbody>
           <!-- CODIGO PHP - ########## CICLO PARA MOSTRAR LOS REGISTROS DE LOS EXAMENES_DIAGNOSTICO ########-->
             <?php while ( $renglon = mysqli_fetch_array($Result_Ver_Examenes_D)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
                 <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
                   <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td class="text-center"><?php echo $renglon['Id_ExamenD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <?php
                       $Fecha_ExamenD = $renglon['Fecha_ExamenD'];
                       $exploded = multiexplode(array("-","T"),$Fecha_ExamenD); ?>
                       <td class="text-center"><?php echo "$exploded[2]/$exploded[1]/$exploded[0] Hora: $exploded[3]"; ?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td class="text-center"><?php echo $renglon['Matricula_AlumnoD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td class="text-center"><?php echo $renglon['Nivel_ExamenD']?></td>
                       <td class="text-center"><?php echo $renglon['No_Recibo_ED']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                       <td><a class="btn btn-primary" role ="button" href="../FormsEditar/Examenes_Diagnostico_Para_Editar_Nivel.php?Id_ExamenD=<?php echo $renglon['Id_ExamenD'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
                     </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
               <?php }?>
           </tbody>
         </table>
       </div>
     </div>


   </body>
 </html>
