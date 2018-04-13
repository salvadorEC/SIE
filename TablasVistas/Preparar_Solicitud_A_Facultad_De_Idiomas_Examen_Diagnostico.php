<?php

#################################################################
# PREPARAR EL REPORTE PARA LA SOLICITUD A LA FACULTAD IDIOMAS...#
# ESTA PREPARACION PERMITIRA VER EL REPORTE QUE SE VA A GENERAR #
# ANTES DE IMPRIMIRLO Y/O GUARDARLO COMO PDF...                 #
#################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

//Comprobar la conexion a la base de datos
if ($mysqli->connect_errno) {
    echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Recibir la fecha y hora del examen Diagnostico ...
$Fecha_ExamenD = $_REQUEST['Fecha_ExamenD'];
//Realizar la busqueda en la base de datos... parametro: Fecha y Hora del Examen Diagnostico.
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
     <h2>Generar Solicitud a la Facultad de Idiomas</h2>
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
           <?php
           $numero = 0;
           while ( $renglon = mysqli_fetch_array($Result_Ver_Examenes_D)){
             $numero++;
             ?> <!-- Ciclo para sacar los datos del array y para crear filas -->
               <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
                 <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                     <td class="text-center"><?php echo $numero;?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                     <td class="text-center"><?php echo $renglon['Fecha_ExamenD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                     <td class="text-center"><?php echo $renglon['Matricula_AlumnoD']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                     <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                     <td class="text-center"><?php echo $renglon['Nivel_ExamenD']?></td>
                     <td class="text-center"><?php echo $renglon['No_Recibo_ED']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                   </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
             <?php }?>
         </tbody>
       </table>
     </div>

     <!--- ############ FORM INVISIBLE - IMPRIMIR REPORTE EXAMEN DIAGNOSTICO SOLICITUD ################-->
     <form class="form-horizontal" action="../ReportesPDF/Examenes_Diagnostico_Solicitud_Facultad_Idiomas.php" method="post">
       <div class="form-group"> <!--Agrupar Label y El Input-->
         <input type="hidden" name="Fecha_ExamenD" value="<?php echo $Fecha_ExamenD ?>"> <!-- INPUT INVISIBLE que manda como parametro la fecha y hora del examen Diagnostico-->
       </div>
       <div class="col-sm-offset-2 col-sm-8"> <!-- Recorrer el boton dos columnas hacia la derecha y ancharlo 6 columnas-->
         <button type="submit" class="btn btn-success btn-block">Imprimir Solicitud</button>
       </div>
     </form>

 </body>
</html>
