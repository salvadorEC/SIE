<?php

  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);

    //Comprobar la conexion a la base de datos
    if ($mysqli->connect_errno)
    {
      echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
      echo "conexion con exito";

    //Recibir los valores del Formulario Editar..Alumnos
    $Id_Alumno = $_REQUEST['Id_Alumno'];
    $Matricula_Alumno = $_REQUEST['Matricula_Alumno'];
    $Nombre_Alumno = $_REQUEST['Nombre_Alumno'];
    $Carrera_Alumno = $_REQUEST['Carrera_Alumno'];
    $Semestre_Alumno = $_REQUEST['Semestre_Alumno'];

    //Hacer el Query Update a la base de datos .. tabla Alumnos.
    $UpdateAlumno = "UPDATE ALUMNOS SET Matricula_Alumno='".$Matricula_Alumno."',Nombre_Alumno='".$Nombre_Alumno."',Carrera_Alumno='".$Carrera_Alumno."',Semestre_Alumno='".$Semestre_Alumno."' WHERE Id_Alumno = '".$Id_Alumno."'";
    $Query = $mysqli->query($UpdateAlumno);

    
?>
