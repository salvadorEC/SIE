<?php
    // Incluir configuracion para conectar a la base de datos
    include "../configuracion.php";

    //Conectar a la base de datos
    $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);
    $acentos = $mysqli->query("SET NAMES 'utf8'");

      //Comprobar la conexion a la base de datos
      if ($mysqli->connect_errno)
        {
          echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
          else
            {
              //query a la base de datos
              $Matricula_Alumno = $_GET['Matricula_Alumno'];
              $Eliminar_Alumno = "DELETE FROM $ALUMNOS WHERE Matricula_Alumno = '".$Matricula_Alumno."' ";
              $Result_Eliminar_Alumno = $mysqli->query($Eliminar_Alumno);

              header("Location:../TablasVistas/Alumnos_agrupados_por_carrera.php");
            }
?>
