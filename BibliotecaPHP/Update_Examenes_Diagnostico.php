<?php

  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);

    //Comprobar la conexion a la base de datos
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {

        //Recibir los valores del Formulario Editar..Alumnos
        $Id_ExamenD = $_REQUEST['Id_ExamenD'];
           $Fecha_ExamenD = $_REQUEST['Fecha_ExamenD'];
           $Matricula_AlumnoD = $_REQUEST['Matricula_AlumnoD'];
           $Nivel_ExamenD = $_REQUEST['Nivel_ExamenD'];

        //Hacer el Query Update a la base de datos .. tabla Alumnos.
        $UpdateExamenD = "UPDATE EXAMENES_DIAGNOSTICO SET Fecha_ExamenD ='".$Fecha_ExamenD."', Matricula_AlumnoD = '".$Matricula_AlumnoD."', Nivel_ExamenD = '".$Nivel_ExamenD."' WHERE Id_ExamenD = '".$Id_ExamenD."' ";
           $Query = $mysqli->query($UpdateExamenD);

           header("Location:../TablasVistas/Examenes_diagnostico.php");
       }
