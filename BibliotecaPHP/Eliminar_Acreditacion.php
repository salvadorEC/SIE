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
              $Fecha_Por_Lote = $_GET['Fecha_Acreditacion'];
              //query a la base de datos
              $Id_Acreditacion = $_GET['Id_Acreditacion'];
              $Eliminar_Carta_Acreditacion = "DELETE FROM $ACREDITACIONES WHERE Id_Acreditacion = '".$Id_Acreditacion."' ";
              $Result_Eliminar_Carta_Acreditacion = $mysqli->query($Eliminar_Carta_Acreditacion);

              header('Location:../TablasVistas/Ver_Cada_Lote.php?Fecha_Acreditacion='.$Fecha_Por_Lote.'');
            }
?>
