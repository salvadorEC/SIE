<?php

###########################################################
# Aqui se podra dar de alta a alumnos desde TablasVistas  #
# y depues se redirigira a TablasVistas de Nuevo.         #
###########################################################

  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);
  $acentos = $mysqli->query("SET NAMES 'utf8'");

    //Comprobar la conexion a la base de datos
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

// Version 1.0.1 ... Comprobar si el alumno ya esta registrado .. validar con matricula. para despues mostrar "Alumno Ya Registrado";

  $Matricula_Alumno = $_REQUEST['Matricula_Alumno'];
  $Nombre_Alumno = strtoupper($_REQUEST['Nombre_Alumno']);
  $Carrera_Alumno = strtoupper($_REQUEST['Carrera_Alumno']);
  $Semestre_Alumno = $_REQUEST['Semestre_Alumno'];

  $mat_longitud = strlen($Matricula_Alumno); // CONTAR NUMERO DE CARACTERES
  //COMPROBAR QUE LA MATRICULA CONTENGA 8 NUMEROS
  if ($mat_longitud == 8) {

    $Matricula_Alumno= $_REQUEST['Matricula_Alumno'];
    //COMPROBAR SI EL ALUMNO EXISTE (MATRICULA COMO PARAMETRO)
    $Ver_Alumnos = "SELECT * FROM $ALUMNOS WHERE Matricula_Alumno = '".$Matricula_Alumno."'";
    $Result_Ver_Alumno = $mysqli->query($Ver_Alumnos);
    //GUARDAR EL RESULTADO EN EL ARRAY
    $row = $Result_Ver_Alumno->fetch_assoc();
    $Matricula = $row['Matricula_Alumno'];
    //COMPROBAR ALUMNO (MATRICULA)
    if ($Matricula == $Matricula_Alumno) {
      echo nl2br("No Se Puede Realizar El Registro, Esta Matricula Pertenece Al Alumno: [".$row['Matricula_Alumno']."]  [".$row['Nombre_Alumno']."]
                \n DETALLE DE ERROR ! Estas Intentando Registrar Una Matricula Existente Con Otro Nombre De Alumno
                \n O Estas Intentando Duplicar El Registro");
    }
    else
      {
        //COMPROBAR SI EL ALUMNO YA EXISTE (PARA NO REGISTRARLO DE NUEVO CON DIFERENTE MATRICULA)
        $Nombre_Alumno = strtoupper($_REQUEST['Nombre_Alumno']);
        //SELECT POR NOMBRE DEL ALUMNO (NO X MATRICULA DEBIDO A QUE LA MATRICULA PUEDE NO EXISTIR)
        $Ver_Alumnos = "SELECT * FROM $ALUMNOS WHERE Nombre_Alumno LIKE '%".$Nombre_Alumno."%'";
        $Result_Ver_Alumno = $mysqli->query($Ver_Alumnos);
        //GUARDAR EL RESULTADO EN EL ARRAY
        $row = $Result_Ver_Alumno->fetch_assoc();
        $Nombre = $row['Nombre_Alumno'];
        //COMPROBAR SI EL ALUMNO YA EXISTE
        if ( $Nombre != '') {
          echo nl2br("ERROR! Estas Intentando Registrar  Un Nombre De Alumno Existente Con Una Matricula Diferente \n
                      El alumno ya se ecuentra registrado como [".$row['Matricula_Alumno']."] [".$row['Nombre_Alumno']."]");

        }
          //SI EL ALUMNO NO EXISTE DEBE DE PODER REGISTRARSE
          else
          {
            $Matricula_Alumno = $_REQUEST['Matricula_Alumno'];
            $Nombre_Alumno = strtoupper($_REQUEST['Nombre_Alumno']);
            $Carrera_Alumno = strtoupper($_REQUEST['Carrera_Alumno']);
            $Semestre_Alumno = $_REQUEST['Semestre_Alumno'];
            // Guardar datos en la base de datos.
            $mysqli->query("INSERT INTO $ALUMNOS (Id_Alumno,Matricula_Alumno,Nombre_Alumno,Carrera_Alumno,Semestre_Alumno)
                            VALUES (NULL,'".$Matricula_Alumno."','".$Nombre_Alumno."','".$Carrera_Alumno."','".$Semestre_Alumno."')");

                            header('Location:../TablasVistas/Alumnos_agrupados_por_carrera.php');
          }
      }



}
// MENSAJE CUANDO LA MATRICULA TIENE MENOS DE 8 NUMEROS.

else
  echo "La matricula debe de contener 8 numeros asegurate de agregar un cero al principio";
?>
