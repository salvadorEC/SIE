<?php

##################################################################################################################
# Hacer Alta de los regstros de Solicitudes de Acreditaciones ...                                                #
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

    //RECIBIR VALORES DE FormsAlta/Alta_Solicitud_Acreditacion.php

    $Ano_Acreditacion = $_REQUEST['Ano_Acreditacion'];
    $Periodo = $_REQUEST['Periodo'];
    $Matricula_Acreditacion = $_REQUEST['Matricula_Acreditacion'];
    $Idioma = $_REQUEST['Idioma'];
    $Nivel_Acreditacion = $_REQUEST['Nivel_Acreditacion'];
    $Docs_Acreditacion = $_REQUEST['Docs_Acreditacion'];

    // #### HACER INSERT A LA BASE DE DATOS #####
  //$Insert = "INSERT INTO `$ACREDITACIONES`(`Id_Acreditacion`, `No_Lote`, `Ano_Acreditacion`, `No_Oficio`, `Periodo`, `Fecha_Acreditacion`, `Matricula_Acreditacion`, `Idioma`, `Nivel_Acreditacion`, `Docs_Acreditacion`, `Fecha_Entrega_Acreditacion`)
              //VALUES ([null],[null],[$Ano_Acreditacion],[null],[$Periodo],[null],[$Matricula_Acreditacion],[$Idioma],[$Nivel_Acreditacion],[$Docs_Acreditacion],[null]);";
              $Insert = "INSERT INTO $ACREDITACIONES(Id_Acreditacion,No_Lote,Ano_Acreditacion,No_Oficio,Periodo,Fecha_Acreditacion,Matricula_Acreditacion,Idioma,Nivel_Acreditacion,Docs_Acreditacion) VALUES (null,'','$Ano_Acreditacion','','$Periodo',null,'$Matricula_Acreditacion','$Idioma','$Nivel_Acreditacion','$Docs_Acreditacion');";

  $query = $mysqli->query($Insert);
    //Regresar a registrar otro alumno..
    header("Location:../FormsAlta/Registro_Solicitud_Acreditacion.php");
 ?>
