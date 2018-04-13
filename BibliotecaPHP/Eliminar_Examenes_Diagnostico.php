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
              $Id_ExamenD = $_GET['Id_ExamenD'];
              $Eliminar_ExamenD = "DELETE FROM $EXAMENES_DIAGNOSTICO WHERE Id_ExamenD = '".$Id_ExamenD."' ";
              $Result_Eliminar_ExamenD = $mysqli->query($Eliminar_ExamenD);

              header("Location:../TablasVistas/Examenes_diagnostico.php");
            }
?>
