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

    //RECIBIR MATRICULA INGRESADA
    $Matricula_De_Comprobacion = $_GET['Matricula_De_Comprobacion'];

    //Buscar en la base de datos A TODOS LOS ALUMNOS...
    $Ver_Alumnos = "SELECT * FROM $ALUMNOS WHERE Matricula_Alumno = '".$Matricula_De_Comprobacion."'";
    $Result_Ver_Alumno = $mysqli->query($Ver_Alumnos);

    //Guardar el resultado en un array
    $row = $Result_Ver_Alumno->fetch_assoc();

    if ($row['Matricula_Alumno'] == $Matricula_De_Comprobacion)
      {
          header('Location:../FormsAlta/Alta_Solicitud_Acreditacion.php?Matricula_Alumno='.$Matricula_De_Comprobacion.'');
      }
      else
          header('Location:../FormsAlta/Alumno_A_Solicitud_Acreditacion.php?Matricula_Alumno='.$Matricula_De_Comprobacion.'');
 ?>
