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
// Version 1.0.1 ... Comprobar si el alumno ya esta registrado .. validar con matricula. para despues mostrar "Alumno Ya Registrado";

  //Recibir datos...
  $Matricula_Alumno = $_REQUEST['Matricula_Alumno'];
  $Nombre_Alumno = $_REQUEST['Nombre_Alumno'];
  $Carrera_Alumno = $_REQUEST['Carrera_Alumno'];
  $Semestre_Alumno = $_REQUEST['Semestre_Alumno'];


  // Guardar datos en la base de datos.
  $mysqli->query("INSERT INTO ALUMNOS (Id_Alumno,Matricula_Alumno,Nombre_Alumno,Carrera_Alumno,Semestre_Alumno)
                  VALUES (NULL,'".$Matricula_Alumno."','".$Nombre_Alumno."','".$Carrera_Alumno."','".$Semestre_Alumno."')");


 ?>
