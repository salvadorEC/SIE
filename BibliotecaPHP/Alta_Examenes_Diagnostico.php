<?php
  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);

    //Comprobar la conexion a la base de datos
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

  // Version 1.0.1 .. ver si el alumno ya hizo el examen diagnostico y arrojar el mensaje de que ya hizo el examen que esta vez tendra un costo..
  //Version 1.0.1 si el alumno no esta registrado enviar a formulario para registrarlo..

   //Recibir los datos
   $Fecha_ExamenD = $_REQUEST['Fecha_ExamenD'];
   $Matricula_AlumnoD = $_REQUEST['Matricula_AlumnoD'];
   $Nivel_ExamenD = $_REQUEST['Nivel_ExamenD'];

   //Guardar datos en la base de datos
   $mysqli->query("INSERT INTO EXAMENES_DIAGNOSTICO (Id_ExamenD,Fecha_ExamenD,Matricula_AlumnoD,Nivel_ExamenD)
                    VALUES (NULL,'".$Fecha_ExamenD."','".$Matricula_AlumnoD."','".$Nivel_ExamenD."')");

  // REGRESEAR A VISTAS DE TABLAS EXAMENES_DIAGNOSTICO
  header("Location:../TablasVistas/Examenes_diagnostico.php");
?>
