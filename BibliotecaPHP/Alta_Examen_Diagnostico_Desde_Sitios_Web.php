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

   //Recibir los datos
   $Fecha_ExamenD = $_REQUEST['Fecha_ExamenD'];
   $Matricula_AlumnoD = $_REQUEST['Matricula_AlumnoD'];
   $Nivel_ExamenD = $_REQUEST['Nivel_ExamenD'];


   //Guardar datos en la base de datos
   $mysqli->query("INSERT INTO $EXAMENES_DIAGNOSTICO (Id_ExamenD,Fecha_ExamenD,Matricula_AlumnoD,Nivel_ExamenD)
                    VALUES (NULL,'".$Fecha_ExamenD."','".$Matricula_AlumnoD."','".$Nivel_ExamenD."')");
                    //Enviar ID Registro  == Folio y Nombre del alumno
                    $ver_Examenes_D = "SELECT Id_ExamenD,Nombre_Alumno FROM $ALUMNOS INNER JOIN $EXAMENES_DIAGNOSTICO ON Matricula_Alumno = Matricula_AlumnoD WHERE Matricula_AlumnoD = ".$Matricula_AlumnoD.";";
                    $Result_Ver_Examenes_D = $mysqli->query($ver_Examenes_D);

                    $row =  $Result_Ver_Examenes_D->fetch_assoc();

  // REGRESEAR A VISTAS DE TABLAS EXAMENES_DIAGNOSTICO
  header("Location:../SITIOS WEB - SIE/Paginas_Principales/Solicitar_ExamenD_Alumno.php?mensaje=Exitoso&Folio=".$row['Id_ExamenD']."&Nombre=".$row['Nombre_Alumno']."");
?>
