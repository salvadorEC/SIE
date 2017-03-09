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

    //RECIBIR LOS DATOS DE FormsEditar/Solicitudes_Acreditaciones.php
  $Id_Acreditacion = $_REQUEST['Id_Acreditacion'];
  $No_Lote = $_REQUEST['No_Lote'];
  $Ano_Acreditacion = $_REQUEST['Ano_Acreditacion'];
  $No_Oficio = $_REQUEST['No_Oficio'];
  $Periodo = $_REQUEST['Periodo'];
  $Fecha_Acreditacion = $_REQUEST['Fecha_Acreditacion'];
  $Matricula_Acreditacion = $_REQUEST['Matricula_Acreditacion'];
  $Idioma = $_REQUEST['Idioma'];
  $Nivel_Acreditacion = $_REQUEST['Nivel_Acreditacion'];
  $Docs_Acreditacion = $_REQUEST['Docs_Acreditacion'];

    // HACER UPDATE A TABLA ACREDITACIONES
   $Update_Acreditaciones = "UPDATE $ACREDITACIONES  SET No_Lote='$No_Lote',Ano_Acreditacion='$Ano_Acreditacion',No_Oficio='$No_Oficio',Periodo='$Periodo',Fecha_Acreditacion='$Fecha_Acreditacion',Matricula_Acreditacion='$Matricula_Acreditacion',Idioma='$Idioma',Nivel_Acreditacion='$Nivel_Acreditacion',Docs_Acreditacion='$Docs_Acreditacion' WHERE Id_Acreditacion = '$Id_Acreditacion'";
      $Query = $mysqli->query($Update_Acreditaciones);

      header("Location:../TablasVistas/Generar_Nuevo_Lote_Acreditaciones.php");
 ?>
