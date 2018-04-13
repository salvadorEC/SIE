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
  //Recibir datos...
  $Fecha_ExamenD = $_REQUEST['Fecha_ExamenD'];
  $Fecha_RegistroED = $_REQUEST['Fecha_RegistroED'];

  // Guardar datos en la base de datos.
  $mysqli->query("INSERT INTO $sitio_web_examenes_diagnostico(Id_Fecha_ED,Fecha_ED,Fecha_RegistroED)
                  VALUES (NULL,'".$Fecha_ExamenD."','".$Fecha_RegistroED."')");

  header("Location:../SITIOS WEB - SIE/Paginas_Principales/Examenes_Diagnostico_Admin.php");
 ?>
