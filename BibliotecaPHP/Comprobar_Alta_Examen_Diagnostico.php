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


//############## E X A M E N E S - D I A G N O S T I C O - PAGAR O NO - ################################

// Se recibe el valor del buscador por matricula de la ruta : FormsAlta/Registro_Examen_Diagnostico.php
$Matricula_De_Comprobacion = $_REQUEST['Matricula_De_Comprobacion'];

//Buscar en la base de datos A TODOS LOS ALUMNOS...

$Ver_Alumnos = "SELECT * FROM ALUMNOS WHERE Matricula_Alumno = '".$Matricula_De_Comprobacion."'";
$Result_Ver_Alumno = $mysqli->query($Ver_Alumnos);

//Guardar el resultado en un array
$row = $Result_Ver_Alumno->fetch_assoc();

//Condicion para Hacer el registro al examen diagnostico o para mandar a que se registre al alumno.
if ($row['Matricula_Alumno'] == $Matricula_De_Comprobacion)
  {

    if  ($row['Carrera_Alumno']!="Tronco Común") // Si  el alumno no es de Tronco Comun que PAGUE!.
      {
            header('Location:../FormsAlta/Examenes_Diagnostico_Pago.php?Matricula_AlumnoD='.$row['Matricula_AlumnoD'].'');//echo "Este alumno no es de tronco comun"; // Aqui va el link del Form Que Contiene el No de Recibo.
      }
        else
          {
              // Y si el alumno esta registrado... Hacer consulta a la base de datos de la tabla EXAMENES_DIAGNOSTICO
              $Ver_Examenes_Diagnostico = "SELECT * FROM EXAMENES_DIAGNOSTICO WHERE Matricula_AlumnoD = '".$Matricula_De_Comprobacion."' ";
              $Result_Ver_ExamenD = $mysqli->query($Ver_Examenes_Diagnostico);
              //Meter el registro en un array
              $row = $Result_Ver_ExamenD->fetch_assoc();

              /* ####### Ver si el alumno ya esta registrado en la base de datos de EXAMENES_DIAGNOSTICO
                para ver si el alumno debe pagar o NO ######## */
              if ($row['Matricula_AlumnoD']==$Matricula_De_Comprobacion)
                {

                  header('Location:../FormsAlta/Examenes_Diagnostico_Pago.php?Matricula_AlumnoD='.$row['Matricula_AlumnoD'].'');
                }
                  else
                    {
                      //Hacer una consulta a la base de datos ALUMNOS para mandar la matricula al URL
                      $Ver_Alumnos = "SELECT * FROM ALUMNOS WHERE Matricula_Alumno = '".$Matricula_De_Comprobacion."'";
                      $Result_Ver_Alumno = $mysqli->query($Ver_Alumnos);

                      //Guardar el resultado en un array
                      $row = $Result_Ver_Alumno->fetch_assoc();

                      header('Location:../FormsAlta/Examenes_Diagnostico.php?Matricula_Alumno='.$row['Matricula_Alumno'].'');
                    }
          } // Else .. cuando el alumno Si es de tronco Comun..

    }// If de la comprobacion de que si el alumno esta o NO en la base de datos
      else // si el alumno no esta en la base da datos... ir directamente a registrarlo en la BD
        {
          header('Location:../FormsAlta/Alumno_A_Examen_Diagnostico.php?Matricula_Alumno='.$Matricula_De_Comprobacion.'');
        }


 ?>
