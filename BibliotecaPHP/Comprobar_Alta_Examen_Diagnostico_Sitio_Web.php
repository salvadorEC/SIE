<?php

########################################################################################################
# BUSCAR EN LA BASE DE DATOS TODOS LOS REGISTROS EN LA BD                                              #
# SI EL ALUMNO YA ESTA REGISTRADO Y SE INTENTA REGISTRAR DE NUEVO..                                      #
# SE DIRIGIRA AL FORMULARIO EN DONDE SE REGISTRARA EL PAGO PARA HACER DE NUEVO EL EXAMENES_DIAGNOSTICO #
########################################################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");


//############## E X A M E N E S - D I A G N O S T I C O - PAGAR O NO - ################################

// Se recibe el valor del buscador por matricula de la ruta : FormsAlta/Registro_Examen_Diagnostico.php
$Matricula_De_Comprobacion = $_REQUEST['Matricula_De_Comprobacion'];

//Buscar en la base de datos A TODOS LOS ALUMNOS...
$Ver_Alumnos = "SELECT * FROM $ALUMNOS WHERE Matricula_Alumno = '".$Matricula_De_Comprobacion."'";
$Result_Ver_Alumno = $mysqli->query($Ver_Alumnos);

//Guardar el resultado en un array
$row = $Result_Ver_Alumno->fetch_assoc();

//Hacer consulta a la base de datos de la tabla EXAMENES_DIAGNOSTICO
$Ver_Examenes_Diagnostico = "SELECT * FROM $EXAMENES_DIAGNOSTICO WHERE Matricula_AlumnoD = '".$Matricula_De_Comprobacion."' ";
$Result_Ver_ExamenD = $mysqli->query($Ver_Examenes_Diagnostico);

//Meter el registro en un array
$row2 = $Result_Ver_ExamenD->fetch_assoc();

//Comprobar si el alumno esta en la base de datos...
if ($row['Matricula_Alumno'] == $Matricula_De_Comprobacion)
  {
    //Comprobar si el alumno ya hizo antes una solicitud de examen...
    if ($row2['Matricula_AlumnoD']==$Matricula_De_Comprobacion)
      {
        header('Location:../SITIOS WEB - SIE/Paginas_Principales/Solicitar_ExamenD_Alumno.php?mensaje=Pago');
      }
        //Comprobar si el alumno Que no ha hecho antes una solicitud es de Tronco Comun..
        else if ($row['Carrera_Alumno']!="TRONCO COMÚN") // Si  el alumno no es de Tronco Comun que PAGUE!.
          {
            header('Location:../SITIOS WEB - SIE/Paginas_Principales/Solicitar_ExamenD_Alumno.php?mensaje=Pago');
          }
            //Si el Alumno Es de Tronco Comun... Si el Alumno No Solicito Antes hacer su Examen Diagnostico..
            else
            {
              header('Location:../SITIOS WEB - SIE/Paginas_Principales/Seleccionar_Fecha_ED_Alumno.php?Matricula_Alumno='.$row['Matricula_Alumno'].'');
            }
    }// If de la comprobacion de que si el alumno esta o NO en la base de datos
      else // si el alumno no esta en la base da datos... mostrar mensaje de que debe de registrarse..
        {
          header('Location:../SITIOS WEB - SIE/Paginas_Principales/Solicitar_ExamenD_Alumno.php?mensaje=Alumno');
        }


 ?>
