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

    $Ver_Acreditaciones= "SELECT Id_Acreditacion,No_Lote,Ano_Acreditacion,No_Oficio,Periodo,Fecha_Acreditacion,Matricula_Acreditacion,Nombre_Alumno,Idioma,Nivel_Acreditacion,Carrera_Alumno FROM $ACREDITACIONES JOIN $ALUMNOS ON  Matricula_Alumno = Matricula_Acreditacion  WHERE Id_Acreditacion = '$Id_Acreditacion'  ";
    //EJECUTAR EL QUERY...
    $Result_Ver_Acreditaciones = $mysqli->query($Ver_Acreditaciones);


    // Funcion para tratar/convertir fechas..
      function multiexplode ($delimiters,$string) {

          $ready = str_replace($delimiters, $delimiters[0], $string);
          $launch = explode($delimiters[0], $ready);
          return  $launch;
      }

    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {

        // Arial bold 15
        $this->SetFont('Arial','B',14);

        // ###### Título ######


        $this->Ln(1); // Salto de linea
        $this->Cell(50); // Movernos a la derecha
        $this->Cell(0,10,'FACULTAD DE CIENCIAS ADMINISTRATIVAS',0,0,'');
        $this->Ln(20);

        $this->SetFont('Arial','',11);
        $this->Cell(15); // Movernos a la derecha
        $this->Cell(0,10,'Oficio No.',0,0,'');
        $this->Ln(6);
        $this->Cell(15); // Movernos a la derecha
        $this->Cell(0,10,utf8_decode('Asunto:'),0,0,'');
        $this->Cell(-137); // Movernos a la derecha
        $this->SetFont('Arial','B',11);
        $this->Cell(0,10,utf8_decode('Constancia de Acreditación de Conocimiento de Lengua Extranjera'),0,0,'');
        $this->Ln(6);
        $this->Cell(15); // Movernos a la derecha
        $this->SetFont('Arial','',11);
        $this->Cell(0,10,utf8_decode('Nombre:'),0,0,'');
        $this->Ln(6);
        $this->Cell(15); // Movernos a la derecha
        $this->SetFont('Arial','',11);
        $this->Cell(0,10,utf8_decode('Matrícula:'),0,0,'');
        $this->Ln(6);
        $this->Cell(15); // Movernos a la derecha
        $this->SetFont('Arial','',11);
        $this->Cell(0,10,utf8_decode('Facultad:'),0,0,'');
        $this->Cell(-137); // Movernos a la derecha
        $this->SetFont('Arial','B',11);
        $this->Cell(0,10,utf8_decode('Facultad de Ciencias Administrativas'),0,0,'');
        $this->Ln(6);
        $this->Cell(15); // Movernos a la derecha
        $this->SetFont('Arial','',11);
        $this->Cell(0,10,utf8_decode('Carrera:'),0,0,'');
        $this->Ln(6);
        $this->Cell(15); // Movernos a la derecha
        $this->SetFont('Arial','',11);
        $this->Cell(0,10,utf8_decode('Fecha de Acreditación:'),0,0,'');


    }

    // Pie de página
    function Footer()
    {

        // Posición: a 1,5 cm del final
      $this->SetY(-15);
        // Arial italic
        $this->SetFont('Arial','B',10);
        $this->Text(24,268,utf8_decode(('Vo.Bo/GMR.')));

    }
    }





//Crear nueva pagina
$pdf = new PDF('P','mm',array(216,279));

while ($row = mysqli_fetch_array($Result_Ver_Acreditaciones))
    {

      $pdf->AddPage('P', 'Letter');
      $pdf->SetFont('Arial','B',12);
      $pdf->SetX(69);
      $pdf->Cell(0,-61,utf8_decode($row['No_Oficio']),0,0,'');
      $pdf->SetX(79);
      $pdf->Cell(0,-61,utf8_decode($row['Periodo']),0,0,'');
      $pdf->SetX(69);
      $pdf->Cell(0,-39,utf8_decode(mb_strtoupper($row['Nombre_Alumno'])),0,0,'');
      $pdf->SetX(69);
      $pdf->Cell(0,-26,utf8_decode($row['Matricula_Acreditacion']),0,0,'');
      $pdf->SetX(69);
      $pdf->Cell(0,-3,utf8_decode(mb_strtoupper($row['Carrera_Alumno'])),0,0,'');
      $Fecha_Acreditacion = $row['Fecha_Acreditacion'];
      $Fecha = $Fecha_Acreditacion;
      $exploded = multiexplode(array("-","T"),$Fecha);

      if ($exploded [1]=="01")
        {
          $exploded [1]="Enero";
        }
        else if ($exploded [1]=="02"){
          $exploded [1]="Febrero";
        }
        else if ($exploded [1]=="03"){
          $exploded [1]="Marzo";
        }
        else if ($exploded [1]=="04"){
          $exploded [1]="Abril";
        }
        else if ($exploded [1]=="05"){
          $exploded [1]="Mayo";
        }
        else if ($exploded [1]=="06"){
          $exploded [1]="Junio";
        }
        else if ($exploded [1]=="07"){
          $exploded [1]="Julio";
        }
        else if ($exploded [1]=="08"){
          $exploded [1]="Agosto";
        }
        else if ($exploded [1]=="09"){
          $exploded [1]="Septiembre";
        }
        else if ($exploded [1]=="10"){
          $exploded [1]="Octubre";
        }
        else if ($exploded [1]=="11"){
          $exploded [1]="Noviembre";
        }
        else if ($exploded [1]=="12"){
          $exploded [1]="Diciembre";
        }

      // ################# MOSTRAR FECHA LARGA ##########

      $pdf->SetX(69);
      $pdf->Cell(0,10,utf8_decode(''.$exploded [2].' de '.$exploded [1].' de '.$exploded [0]),0,0,'',0);
      $pdf->SetFont('Arial','B',12);
      $pdf->SetX(24);
      $pdf->Cell(0,39,utf8_decode('DEPARTAMENTO DE SERVICIOS'),0,0,'',0);
      $pdf->SetX(24);
      $pdf->SetFont('Arial','B',12);
      $pdf->Cell(0,52,utf8_decode('ESTUDIANTILES Y GESTIÓN ESCOLAR'),0,0,'');
      $pdf->SetX(24);
      $pdf->SetFont('Arial','BI',12);
      $pdf->Cell(0,65,utf8_decode('P r e s e n t e.-'),0,0,'');
      $pdf->SetFont('Arial','',11);
      $pdf->SetX(34);
      $pdf->Cell(0,95,utf8_decode('Por medio de la presente hago constar a usted en mi carácter de Director de la'),0,0,'');
      $pdf->SetX(171);
      $pdf->SetFont('Arial','B',11);
      $pdf->Cell(0,95,utf8_decode('Facultad de '),0,0,'');
      $pdf->SetX(24);
      $pdf->SetFont('Arial','B',11);
      $pdf->Cell(0,110,utf8_decode('Ciencias Administrativas'),0,0,'');
      $pdf->SetX(72);
      $pdf->SetFont('Arial','',11);
      $pdf->Cell(0,110,utf8_decode('de esta Universidad, que  el  alumno cuyos datos aparecen en la parte'),0,0,'');
      $pdf->SetX(24);
      $pdf->Cell(0,125,utf8_decode('superior, cumplió con la '),0,0,'');
      $pdf->SetX(66);
      $pdf->SetFont('Arial','B',11);
      $pdf->Cell(0,125,utf8_decode(' Acreditación  de  Conocimiento  de  la Lengua  Extranjera, ( '),0,0,'');
      $pdf->SetX(178);
      $pdf->Cell(0,125,utf8_decode(mb_strtoupper($row['Idioma'].', ')),0,0,'',0);
      $level = $row['Nivel_Acreditacion'];

      if ( $level == "Nivel 2" || $level == "NIVEL 2") {
        $Nivel = "2do. Nivel";
      }
      else if ( $level == "Nivel 3" || $level == "NIVEL 3") {
          $Nivel = "3er. Nivel";
        }
        else if ( $level == "Nivel 4" || $level == "NIVEL 4") {
          $Nivel = "4to. Nivel";
        }
       else if ( $level == "Nivel 5" || $level == "NIVEL 5") {
          $Nivel = "5to. Nivel";
        }
        else if ( $level == "Nivel 6" || $level == "NIVEL 6") {
          $Nivel = "6to. Nivel";
        }
        else if ( $level == "Nivel 7" || $level == "NIVEL 7") {
          $Nivel = "7mo. Nivel";
        }
        $pdf->SetX(24);
        $pdf->Cell(0,140,utf8_decode($Nivel.' )'),0,0,'');
        $pdf->SetX(45);
        $pdf->SetFont('arial','',11);
        $pdf->Cell(0,140,utf8_decode('como lo especifica el Artículo 117 del Estatuto Escolar de la Universidad Autónoma de'),0,0,'');
      $pdf->SetX(24);
      $pdf->Cell(0,155,utf8_decode('Baja California.'),0,0,'');
      $pdf->SetFont('Arial','',11);
      $pdf->Text(34,164,utf8_decode('Agradezco de antemano, la atención que se sirva brindar a la presente y sin otro particular'));
      $pdf->Text(24,172,utf8_decode('por el momento, reitero a usted la seguridad de nuestra atenta consideración.'));
      // Logo UABC
      $pdf->Image('../images/logo_carta_acreditacion.png',170,202,35);
      // ############ FECHA LARGA DEL FOOTER #######
      $pdf->SetFont('Arial','B',12);
      $pdf->Text(64,195,utf8_decode('Mexicali,  Baja California, '.$exploded [2].' de '.$exploded [1].' de '.$exploded [0]));
      $pdf->Text(64,202,utf8_decode(('"POR LA REALIZACIÓN PLENA DEL HOMBRE"')));
      $pdf->Text(100,208,utf8_decode(('DIRECTOR')));
      $pdf->Text(81,234,utf8_decode(('DR. RAÚL GONZÁLEZ NÚÑEZ')));

      $pdf->SetX(24);


  }

  $pdf->Output();




?>
