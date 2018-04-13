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

  // Conseguir la matricula al momento de hacer clic en Editar...
  $Id_Acreditacion = $_GET['Id_Acreditacion'];

    //Realizar la consulta a la base de datos SIE
    $Ver_Acreditacion = "SELECT Id_Acreditacion,No_Lote,Ano_Acreditacion,No_Oficio,Periodo,Fecha_Acreditacion,Matricula_Acreditacion,Nombre_Alumno,Carrera_Alumno,Idioma,Nivel_Acreditacion,Docs_Acreditacion FROM $ACREDITACIONES JOIN $ALUMNOS ON  Matricula_Alumno = Matricula_Acreditacion WHERE Id_Acreditacion = '".$Id_Acreditacion."'";
    $Result_Ver_Acreditacion = $mysqli->query($Ver_Acreditacion);

  //Guardar el resultado en un array
  $row = $Result_Ver_Acreditacion->fetch_assoc();

?>

 <html>
   <head>
     <meta charset="utf-8">
     <title>Editar Acreditacion</title>
     <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
   </head>
   <body>
     <div class="jumbotron">

     </div>

    <!-- ########### F O R M U L A R I O - EDITAR - A C R E D I T A C I O N #########-->
     <div class="container">

       <form class="form-horizontal" action="../BibliotecaPHP/Agregar_Fecha_Entrega_Acreditacion.php" method="post">

       <div class="row">
         <!--####### Id_Acreditacion ####### -->
          <div class="form-group">
            <input class="form-control" type="hidden" name="Id_Acreditacion" value="<?php echo $row['Id_Acreditacion']; ?>">
         <!--####### No.Lote ####### -->
         <label class="control-label col-sm-2">No. Lote</label>
           <div class="col-sm-2">
             <label class="form-control" type="text" name="No_Lote"><?php echo $row['No_Lote']; ?></label>
             <input class="form-control" type="hidden" name="No_Lote" value="<?php echo $row['No_Lote']; ?>">
           </div>
           <!--####### No.Oficio ####### -->
              <label class="control-label col-sm-2">No. Oficio</label>
                <div class="col-sm-2">
                  <label class="form-control" type="number" name="No_Oficio" ><?php echo $row['No_Oficio']; ?></label>
                  <input class="form-control" type="hidden" name="No_Oficio" value="<?php echo $row['No_Oficio']; ?>">
                </div>
              <!--####### año ####### -->
                 <label class="control-label col-sm-2">Año</label>
                   <div class="col-sm-2">
                     <label class="form-control" ><?php echo $row['Ano_Acreditacion']; ?> </label>
                     <input class="form-control" type="hidden" name="Ano_Acreditacion" value="<?php echo $row['Ano_Acreditacion']; ?>">
                   </div>

              </div>
                  <div class="row">

                 <!--####### Periodo ####### -->
                 <label class="control-label col-sm-2">Periodo</label>
                   <div class="col-sm-2">
                     <label class="form-control" ><?php echo $row['Periodo']; ?> </label>
                     <input class="form-control" type="hidden" name="Periodo" value="<?php echo $row['Periodo']; ?>">
                   </div>

                <!--####### Fecha Acreditacion ####### -->
                <label class="control-label col-sm-2">Fecha Acreditación</label>
                  <div class="col-sm-2">
                    <label class="form-control" type="text" name="Fecha_Acreditacion" ><?php echo $row['Fecha_Acreditacion'];?></label>
                    <input class="form-control" type="hidden" name="Fecha_Acreditacion" value="<?php echo $row['Fecha_Acreditacion'];?>">
                  </div>
                <label class="control-label col-sm-2">Fecha De Entrega</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="date" name="Fecha_Entrega_Acreditacion" required="required">
                  </div>
                  </div>

                  <br>


                   <!--####### Matricula_Acreditacion ####### -->
                   <div class="form-group">
                     <label class="control-label col-sm-2"> Matricula Alumno </label>
                     <div class="col-sm-10">
                       <label class="form-control"><?php echo $row['Matricula_Acreditacion']?></label>
                       <input class="form-control" type="hidden" name="Matricula_Acreditacion" value="<?php echo $row['Matricula_Acreditacion']?>">
                     </div>
                   </div>
                   <!--####### NOMBRE ALUMNO ####### -->
                   <div class="form-group">
                     <label class="control-label col-sm-2"> Nombre Alumno </label>
                     <div class="col-sm-10">
                       <label class="form-control"><?php echo $row['Nombre_Alumno']?></label>
                     </div>
                   </div>
                   <!--####### CARRERA ALUMNO ####### -->
                   <div class="form-group">
                     <label class="control-label col-sm-2"> Carrera Alumno </label>
                     <div class="col-sm-10">
                       <label class="form-control"><?php echo $row['Carrera_Alumno']?></label>
                     </div>
                   </div>
                   <!--####### IDIOMA ####### -->
                   <div class="form-group">
                     <label class="control-label col-sm-2"> Idioma </label>
                     <div class="col-sm-10">
                       <label class="form-control"><?php echo $row['Idioma']?></label>
                       <input class="form-control" type="hidden" name="Idioma" value="<?php echo $row['Idioma']?>">
                     </div>
                   </div>
                   <!--####### NIVEL ####### -->
                   <div class="form-group">
                     <label class="control-label col-sm-2"> Nivel </label>
                     <div class="col-sm-10">
                       <label class="form-control"><?php echo $row['Nivel_Acreditacion']?></label>
                       <input class="form-control" type="hidden" name="Nivel_Acreditacion" value="<?php echo $row['Nivel_Acreditacion']?>">
                     </div>
                   </div>
                   </div>
          </div>


       <!-- ######## GUARDAR ####### -->
       <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="btn btn-info btn-block">Agregar Fecha</button>
         </div>
       </div>

       </form>
     </div>
   </body>
 </html>
