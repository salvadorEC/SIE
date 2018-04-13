<?php

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");


$Matricula_De_Comprobacion = $_REQUEST['Matricula_De_Comprobacion'];
$mat_longitud = strlen($Matricula_De_Comprobacion);

if ($mat_longitud == 8) {

    $Matricula_De_Comprobacion = $_REQUEST['Matricula_De_Comprobacion'];
    header('Location:../BibliotecaPHP/Comprobar_Alta_Solicitud_Acreditaciones.php?Matricula_De_Comprobacion='.$Matricula_De_Comprobacion.'');



  }
  else
    echo "Comprueba que la matricula tenga 8 numeros (Agregar un 0 al principio)";



 ?>
