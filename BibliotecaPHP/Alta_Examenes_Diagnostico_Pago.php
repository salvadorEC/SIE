<?php
  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);
  $acentos = $mysqli->query("SET NAMES 'utf8'");

    //Comprobar la conexion a la base de datos
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }


   //Recibir los datos
   $Fecha_ExamenD = $_REQUEST['Fecha_ExamenD'];
   $Matricula_AlumnoD = $_REQUEST['Matricula_AlumnoD'];
   $Nivel_ExamenD = $_REQUEST['Nivel_ExamenD'];
   $No_Recibo_ED = $_REQUEST['No_Recibo_ED'];

   //Guardar datos en la base de datos
   $mysqli->query("INSERT INTO $EXAMENES_DIAGNOSTICO (Id_ExamenD,Fecha_ExamenD,Matricula_AlumnoD,Nivel_ExamenD,No_Recibo_ED)
                    VALUES (NULL,'".$Fecha_ExamenD."','".$Matricula_AlumnoD."','".$Nivel_ExamenD."','".$No_Recibo_ED."')");

  // REGRESEAR A VISTAS DE TABLAS EXAMENES_DIAGNOSTICO
  header("Location:../TablasVistas/Examenes_diagnostico.php");


?>
