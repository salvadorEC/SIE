<?php
###########################################################################
# Hacer la consulta la base de datos y mostrar todas las acreditaciones en#
# tablas fechas sin repetir.                                              #
###########################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

//SELECT TABLA ACREDITACIONES

$Ver_Acreditaciones= "SELECT DISTINCT No_Lote,Fecha_Acreditacion FROM $ACREDITACIONES ORDER BY Fecha_Acreditacion DESC ";
$Result_Ver_Acreditaciones = $mysqli->query($Ver_Acreditaciones);


//Comprobar la conexion a la base de datos
if ($mysqli->connect_errno) {
    echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

 ?>

 <html>
   <head>
     <meta charset="utf-8">
       <title> MENU REPORTES PREPARAR ACREDITACIONES </title>
       <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
       <link rel="stylesheet" href="../includes/css/font-awesome.css"> <!-- Mandar Llamar FontAwesome-->
   </head>
   <body>

     <div class="jumbotron">
       <h2>GENERAR LOTES DE ACREDITACIONES</h2>
     </div>
     <!--####### boton para generar nuevo LOTE de Acreditaciones -->
     <div class="row">
       <div class="col-sm-offset-2 col-sm-6">
         <a href="../TablasVistas/Generar_Nuevo_Lote_Acreditaciones.php" type="button" class="btn btn-primary btn-block" name="">Generar Nuevo LOTE</a>
       </div>
     <!--####### boton Ver Solicitudes Acreditaciones -->
       <div class="col-sm-2">
         <a href="../TablasVistas/Acreditaciones.php" type="button" class="btn btn-danger btn-block" name="">MENU ACREDITACIONES</a>
       </div>
    </div>

     <div class="container">
       <table class="table table-hover">
         <thead>
           <tr>
             <th class="text-center">N0.Lote</th>
             <th class="text-center">Fecha Acreditación</th>
             <th class="text-center">Ver</th>
             <th class="text-center">Excel</th>
           </tr>
         </thead>
         <tbody>
           <tbody>
             <?php
               while ($renglon = mysqli_fetch_array($Result_Ver_Acreditaciones))
                 {
             ?> <!-- Ciclo para sacar los datos del array y para crear filas -->
             <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
             <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                 <td class="text-center"><?php echo $renglon['No_Lote']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                 <td class="text-center"><?php echo $renglon['Fecha_Acreditacion']?></td>
                 <td class="text-center"><a class="btn btn-default" role ="button" href="../TablasVistas/Ver_Cada_Lote.php?Fecha_Acreditacion=<?php echo $renglon['Fecha_Acreditacion'];?>"> <i class="fa fa-eye fa-2x" aria-hidden="true"></i> </a></td>
                 <td class="text-center"><a class="btn btn-success" role ="button" href="../ReportesExcel/Acreditaciones_Por_Lote.php?Fecha_Acreditacion=<?php echo $renglon['Fecha_Acreditacion'];?>"> <i class="fa fa-download fa-2x" aria-hidden="true"></i> </a></td>
               </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
             <?php
                 }
             ?>
           </tbody> <!-- Final Cuerpo de la Tabla de Contabilidad -->
         </tbody>
       </table>

      </div>

   </body>
 </html>
