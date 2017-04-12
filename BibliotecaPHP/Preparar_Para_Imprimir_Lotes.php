<?php

#####################################################################
# IMPRIMIR TODOS LOS N REGISTROS DE X FECHA DE X LOTE               #
#####################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

$Fecha_Por_Lote = $_GET['Fecha_Acreditacion'];

//SELECT TABLA ACREDITACIONES MOSTRAR: Acreditaciones WHERE x Fecha_Acreditacion - Nombre Alumno Ordenado alfabeticamente.

$Ver_Acreditaciones= "SELECT Id_Acreditacion,No_Lote,Ano_Acreditacion,No_Oficio,Periodo,Fecha_Acreditacion,Matricula_Acreditacion,Nombre_Alumno,Idioma,Nivel_Acreditacion FROM $ACREDITACIONES JOIN $ALUMNOS ON  Matricula_Alumno = Matricula_Acreditacion  WHERE Fecha_Acreditacion = '$Fecha_Por_Lote' ORDER BY Nombre_Alumno ASC  ";

$Result_Ver_Acreditaciones = $mysqli->query($Ver_Acreditaciones);


 ?>
