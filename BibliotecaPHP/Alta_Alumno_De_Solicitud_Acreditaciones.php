<?php

##################################################################################################################
# Cuando se quiera dar de alta una Alta_Solicitud_Acreditacion .. y el alumno no este registrado en la base de datos ...   #
# se enviara aqui para dar de alta al alumno y despues se dirigira al formulario de Alta_Solicitud_Acreditacion..  #
##################################################################################################################
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
  $Matricula_Alumno = $_REQUEST['Matricula_Alumno'];
  $Nombre_Alumno = $_REQUEST['Nombre_Alumno'];
  $Carrera_Alumno = $_REQUEST['Carrera_Alumno'];
  $Semestre_Alumno = $_REQUEST['Semestre_Alumno'];

  // Guardar datos en la base de datos.
  $mysqli->query("INSERT INTO $ALUMNOS (Id_Alumno,Matricula_Alumno,Nombre_Alumno,Carrera_Alumno,Semestre_Alumno)
                  VALUES (NULL,'".$Matricula_Alumno."','".$Nombre_Alumno."','".$Carrera_Alumno."','".$Semestre_Alumno."')");

  //######### REGRESAR A LA VISTA DE REGISTRO EXAMENES_DIAGNOSTICO #########

  //Buscar en la base de datos A TODOS LOS ALUMNOS...

  $Ver_Alumnos = "SELECT * FROM $ALUMNOS WHERE Matricula_Alumno = '".$Matricula_Alumno."'";
  $Result_Ver_Alumno = $mysqli->query($Ver_Alumnos);

  //Guardar el resultado en un array
  $row = $Result_Ver_Alumno->fetch_assoc();

  header ('Location:../FormsAlta/Alta_Solicitud_Acreditacion.php?Matricula_Alumno='.$row['Matricula_Alumno'].'');

?>
