<?php

  //Incluir la libreria FPDF
  include "../includes/fpdf.php";
  // Incluir configuracion para conectar a la base de datos
  include "../configuracion.php";
  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);
  $acentos = $mysqli->query("SET NAMES 'utf8'");

    //Comprobar la conexion a la base de datos
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    // Recibir la fecha de acreditacion ... del boton IMPRIMIR LOTE de la ruta Ver_Cada_Lote.php
    $Id_Acreditacion = $_GET['Id_Acreditacion'];

    //SELECT TABLA ACREDITACIONES MOSTRAR: Acreditaciones WHERE x Fecha_Acreditacion - Nombre Alumno Ordenado alfabeticamente.

    $Ver_Acreditaciones= "SELECT Id_Acreditacion,No_Lote,Ano_Acreditacion,No_Oficio,Periodo,Fecha_Acreditacion,Matricula_Acreditacion,Nombre_Alumno,Idioma,Nivel_Acreditacion,Carrera_Alumno FROM $ACREDITACIONES JOIN $ALUMNOS ON  Matricula_Alumno = Matricula_Acreditacion  WHERE Id_Acreditacion = '$Id_Acreditacion' ORDER BY Nombre_Alumno ASC  ";
    //EJECUTAR EL QUERY...
    $Result_Ver_Acreditaciones = $mysqli->query($Ver_Acreditaciones);
    // GUARDAR EL RESULTADO EN UN ARRAY....
    $row = $Result_Ver_Acreditaciones->fetch_assoc();

    // ################# MOSTRAR FECHA DD/MM/YY Y HORA ##########

    function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }

    $Fecha_A = $row['Fecha_Acreditacion'];

    $Fecha = $Fecha_A;
    $exploded = multiexplode(array("-","T"),$Fecha);


    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {

        // Arial bold 15
        $this->SetFont('Arial','B',15);

        // ###### Título ######
        $this->Ln(20); // Salto de linea
        $this->Cell(80); // Movernos a la derecha
        $this->Cell(30,10,'FACULTAD DE CIENCIAS ADMINISTRATIVAS',0,0,'C');
        $this->Ln(20);

        $this->SetFont('Arial','',12);
        $this->Cell(-141); // Movernos a la derecha
        $this->Cell(0,10,'Oficio No.',0,0,'C');
        $this->Ln(6);
        $this->Cell(-145); // Movernos a la derecha
        $this->Cell(0,10,utf8_decode('Asunto:'),0,0,'C');
        $this->Cell(-130); // Movernos a la derecha
        $this->Cell(0,10,utf8_decode('Constancia de Acreditación de Conocimiento de Lengua Extranjera'),0,0,'C');
        $this->Ln(6);
        $this->Cell(-143); // Movernos a la derecha
        $this->Cell(0,10,utf8_decode('Nombre:'),0,0,'C');
        $this->Ln(6);
        $this->Cell(-141); // Movernos a la derecha
        $this->Cell(0,10,utf8_decode('Matrícula:'),0,0,'C');
        $this->Ln(6);
        $this->Cell(-142); // Movernos a la derecha
        $this->Cell(0,10,utf8_decode('Facultad:'),0,0,'C');
        $this->Cell(-169); // Movernos a la derecha
        $this->Cell(0,10,utf8_decode('Facultad de Ciencias Administrativas'),0,0,'C');
        $this->Ln(6);
        $this->Cell(-144); // Movernos a la derecha
        $this->Cell(0,10,utf8_decode('Carrera:'),0,0,'C');
        $this->Ln(6);
        $this->Cell(-116); // Movernos a la derecha
        $this->Cell(0,10,utf8_decode('Fecha de Acreditación:'),0,0,'C');


    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
    }
    }

    // Creación del objeto de la clase heredada

  $pdf = new PDF();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Arial','',12);
  $pdf->SetX(80);
  $pdf->Cell(0,-61,utf8_decode($row['No_Oficio']),0,0,'');
  $pdf->SetX(90);
  $pdf->Cell(0,-61,utf8_decode($row['Periodo']),0,0,'');
  $pdf->SetX(80);
  $pdf->Cell(0,-39,utf8_decode($row['Nombre_Alumno']),0,0,'');
  $pdf->SetX(80);
  $pdf->Cell(0,-26,utf8_decode($row['Matricula_Acreditacion']),0,0,'');
  $pdf->SetX(80);
  $pdf->Cell(0,-3,utf8_decode($row['Carrera_Alumno']),0,0,'');
  $pdf->SetX(89);
  $pdf->Cell(5,10,utf8_decode(''.$exploded [2].'/'.$exploded [1].'/'.$exploded [0]),0,0,'C',0);
  $pdf->SetX(24);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(0,40,utf8_decode('DEPARTAMENTO DE SERVICIOS'),0,0,'',0);
  $pdf->SetX(24);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(0,50,utf8_decode('ESTUDIANTILES Y GESTIÓN ESCOLAR'),0,0,'',0);
  $pdf->SetX(24);
  $pdf->SetFont('Arial','BI',12);
  $pdf->Cell(0,70,utf8_decode('P r e s e n t e.-'),0,0,'',0);
  $pdf->SetFont('Arial','',12);
  $pdf->SetX(38);
  $pdf->Cell(0,95,utf8_decode('Por  este  medio  hago  constar  a  usted  en  mi  carácter  de  Director  de  la'),0,0,'',0);
  $pdf->SetX(24);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(0,110,utf8_decode('Facultad de Ciencias Administrativas '),0,0,'',0);
  $pdf->SetX(100);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(0,110,utf8_decode(' de   esta  Universidad. Que el alumno cuyos '),0,0,'',0);
  $pdf->SetX(24);
  $pdf->Cell(0,125,utf8_decode('datos aparecen en la parte superior, cumplió con la'),0,0,'',0);
  $pdf->SetFont('Arial','B',12);
  $pdf->SetX(122);
  $pdf->Cell(0,125,utf8_decode('Acreditación de  Conocimiento '),0,0,'',0);
  $pdf->SetX(24);
  $pdf->Cell(0,140,utf8_decode('de Lengua Extranjera, ('),0,0,'',0);
  $pdf->SetX(72);
  $pdf->Cell(0,140,utf8_decode($row['Idioma']),0,0,'',0);
  $pdf->SetX(106);
  $pdf->Cell(0,140,utf8_decode($row['Nivel_Acreditacion'].' )'),0,0,'',0);
  $pdf->SetX(123);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(0,140,utf8_decode('como lo especifica el Artículo 117'),0,0,'',0);
  $pdf->SetX(24);
  $pdf->Cell(0,155,utf8_decode('del Estatuto Escolar de la Universidad Autónoma de Baja California.'),0,0,'',0);







  $pdf->Output();




?>
