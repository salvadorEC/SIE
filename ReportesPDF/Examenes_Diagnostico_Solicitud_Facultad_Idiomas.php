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

  // Recibir la fecha y hora del examen Diagnostico ...
  $Fecha_ExamenD = $_REQUEST['Fecha_ExamenD'];

  // ################# MOSTRAR FECHA DD/MM/YY Y HORA ##########

  function multiexplode ($delimiters,$string) {

      $ready = str_replace($delimiters, $delimiters[0], $string);
      $launch = explode($delimiters[0], $ready);
      return  $launch;
  }

  $Fecha = $Fecha_ExamenD;
  $exploded = multiexplode(array("-","T"),$Fecha);

  //print_r($exploded);

/*  echo "Fecha: ";
  echo $exploded [2]; // Dia
  echo "/";
  echo $exploded [1]; // Mes
  echo "/";
  echo $exploded [0]; // Ano
  echo " ";
  echo "Hora: ";
  echo $exploded [3]; // Hora */

  //Realizar la busqueda en la base de datos... parametro: Fecha y Hora del Examen Diagnostico.
  $ver_Examenes_D = "SELECT Matricula_AlumnoD,Nombre_Alumno,Semestre_Alumno,No_Recibo_ED,Carrera_Alumno FROM $ALUMNOS INNER JOIN $EXAMENES_DIAGNOSTICO ON Matricula_Alumno = Matricula_AlumnoD WHERE Fecha_ExamenD = '".$Fecha_ExamenD."';";
  $Result_Ver_Examenes_D = $mysqli->query($ver_Examenes_D);


// ####### CONFIGURACION DEL COCUMENTO PDF ######
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo UABC
    $this->Image('../images/logouabc.png',10,8,20);
    // Logo FCA
    $this->Image('../images/logoFCA.png',170 ,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Título UABC
    $this->Ln(10);
    $this->Cell(80);
    $this->Cell(15,5,utf8_decode('Universidad Autónoma de Baja California'),0,0,'C');
    $this->Ln(5);

    $this->SetFont('Arial','I',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título FCA
    $this->Cell(15,5,utf8_decode('Facultad de Ciencias Administrativas'),0,0,'C');
    // Salto de línea
    $this->Ln(5);

    $this->SetFont('Arial','I',13);
    // Movernos a la derecha
    $this->Cell(80);
    // Título Coordinacion Idioma Extranejero
    $this->Cell(15,5,utf8_decode('Coordinación de Idioma Extranjero'),0,0,'C');
    // Salto de línea
    $this->Ln(10);


}

// ######## Pie de página #######
function Footer()
{
    // Posición: Mover hacia arriba
    $this->SetY(-45);
    // Arial italic 8
    $this->SetFont('Arial','I',12);
    // Pie de pagina
    $this->SetX(100);
    $this->Cell(10,10,utf8_decode('_________________________________________'),0,0,'C');
    $this->Ln(10);
    $this->SetX(100);
    $this->Cell(10,10,utf8_decode('COORDINACIÓN IDIOMA EXTRANJERO'),0,0,'C');
    $this->Ln(5);
    $this->SetX(100);
    $this->Cell(10,10,utf8_decode('C.P. Mayra Gutiérrez Escoboza '),0,0,'C');

}

}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//Color de relleno
$pdf->SetFillColor(143,188,143);
$pdf->SetFont('Arial','',12);
// Movernos a la derecha
$pdf->SetX(10);

// ###### SUB-HEADER #######
$pdf->Cell(190,10,utf8_decode('Lista para examen de ubicación: Inglés '),0,0,'C',1);
$pdf->Ln(8);
$pdf->Cell(190,10,utf8_decode('Fecha: '.$exploded [2].'/'.$exploded [1].'/'.$exploded [0]),0,0,'C',1);
$pdf->Ln(8);
$pdf->Cell(190,10,utf8_decode('Hora: '.$exploded [3]),0,0,'C',1);
// Salto de línea
$pdf->Ln(13);

/*  echo "Fecha: ";
  echo $exploded [2]; // Dia
  echo "/";
  echo $exploded [1]; // Mes
  echo "/";
  echo $exploded [0]; // Ano
  echo " ";
  echo "Hora: ";
  echo $exploded [3]; // Hora */

//###### TITULOS DE LOS CAMPOS ######
$pdf->SetDrawColor(169,169,169);
$pdf->SetFont('Times','B',11,'C');
$pdf->SetX(10);
$pdf->Cell(10,10,'No.',1,0,'C');
$pdf->SetX(21);
$pdf->Cell(105,10,utf8_decode('Apellido Paterno, materno y nombre(s)'),1,0,'C');
$pdf->SetX(127);
$pdf->Cell(19,10,utf8_decode('Matricula'),1,0,'C');
$pdf->SetX(147);
$pdf->Cell(16,10,utf8_decode('Carrera'),1,0,'C');
$pdf->SetX(164);
$pdf->Cell(10,10,utf8_decode('Sem.'),1,0,'C');
$pdf->SetX(175);
$pdf->Cell(25,10,utf8_decode('No.Recibo'),1,0,'C');
$pdf->Ln(6);



$numero = 0; // Contador..
//Sacar todos los registros
while ($renglon = mysqli_fetch_array($Result_Ver_Examenes_D))
  {

  if (  $renglon['Carrera_Alumno'] == "LICENCIADO EN INFORMÁTICA" )

      {
        $renglon['Carrera_Alumno'] = "LI";
      }

        else if ($renglon['Carrera_Alumno'] == "LICENCIADO EN CONTADURÍA")

              {
                   $renglon['Carrera_Alumno'] = "LC";
              }

              else if ($renglon['Carrera_Alumno'] == "LICENCIADO EN ADMINISTRACIÓN DE EMPRESAS")

                    {
                         $renglon['Carrera_Alumno'] = "LAE";
                    }

                    else if ($renglon['Carrera_Alumno'] == "LICENCIADO EN MERCADOTECNIA")

                          {
                               $renglon['Carrera_Alumno'] = "LM";
                          }
                          else if ($renglon['Carrera_Alumno'] == "LICENCIADO EN GESTIÓN TURÍSTICA")

                                {
                                     $renglon['Carrera_Alumno'] = "LGT";
                                }
                                else if ($renglon['Carrera_Alumno'] == "LICENCIADO EN NEGOCIOS INTERNACIONALES")

                                      {
                                           $renglon['Carrera_Alumno'] = "LNI";
                                      }
                                      else if ($renglon['Carrera_Alumno'] == "LICENCIADO EN NEGOCIOS INTERNACIONALES")

                                            {
                                                 $renglon['Carrera_Alumno'] = "LNI";
                                            }
                                            else if ($renglon['Carrera_Alumno'] == "TRONCO COMÚN")

                                                  {
                                                       $renglon['Carrera_Alumno'] = "TC";
                                                  }
                                                  if ($renglon['Semestre_Alumno']== "EGRESADO")
                                                  {
                                                    $renglon['Semestre_Alumno']= "E";
                                                  }


 // CONTENIDO DEL PDF COLUMNAS/DATOS.
  $numero++; // Contador ### comenzar de 1 a 20... dependiendo del numero de vueltas que de el array.
  $pdf->Ln(6);
  $pdf->SetFont('Arial','',10);
  $pdf->SetX(10);
  $pdf->Cell(10,5,''.$numero,1,0,'C');
  $pdf->SetX(21);
  $pdf->Cell(105,5,utf8_decode($renglon['Nombre_Alumno']),1,0,'');
  $pdf->SetX(127);
  $pdf->Cell(19,5,utf8_decode($renglon['Matricula_AlumnoD']),1,0,'C');
  $pdf->SetX(147);
  $pdf->Cell(16,5,utf8_decode($renglon['Carrera_Alumno']),1,0,'C');
  $pdf->SetX(164);
  $pdf->Cell(10,5,utf8_decode($renglon['Semestre_Alumno']),1,0,'C');
  $pdf->SetX(175);
  $pdf->Cell(25,5,utf8_decode($renglon['No_Recibo_ED']),1,0,'C');

  }



//Generar PDF
$pdf->Output();
?>
