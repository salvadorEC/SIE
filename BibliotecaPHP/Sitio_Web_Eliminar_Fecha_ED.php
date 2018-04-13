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
              echo $Id_Fecha_ED = $_GET['Id_Fecha_ED'];
              $Eliminar_Fecha_ED = "DELETE FROM $sitio_web_examenes_diagnostico WHERE Id_Fecha_ED = '".$Id_Fecha_ED."' ";
              $Result_Eliminar_FechaED = $mysqli->query($Eliminar_Fecha_ED);

              header("Location:../SITIOS WEB - SIE/Paginas_Principales/Examenes_Diagnostico_Admin.php");
            }
?>
