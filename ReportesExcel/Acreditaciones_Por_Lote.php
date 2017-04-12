<?php

header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=LOTE#.xls');

//incluir libreria de Excel
require('../includes/ExcelLibrary/PHPExcel.php');
//incluir Configuracion de la base de datos.
require('../configuracion.php');

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");


$Fecha_Por_Lote = $_GET['Fecha_Acreditacion'];


//Hacer consulta a la base de datos para ver cada lote por separado..

$Ver_Acreditaciones= "SELECT No_Lote,Ano_Acreditacion,Semestre_Alumno,No_Oficio,Periodo,Nombre_Alumno,Matricula_Acreditacion,Nombre_Alumno,Carrera_Alumno,Fecha_Acreditacion,Idioma,Nivel_Acreditacion FROM $ACREDITACIONES JOIN $ALUMNOS ON  Matricula_Alumno = Matricula_Acreditacion  WHERE Fecha_Acreditacion = '$Fecha_Por_Lote' ORDER BY Nombre_Alumno ASC  ";
$Result_Ver_Acreditaciones = $mysqli->query($Ver_Acreditaciones);


$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Mayra")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

               // Add some data - Agregar datos a cada columna y Celda
               $objPHPExcel->setActiveSheetIndex(0)
                           ->setCellValue('A1', 'Lote	')
                           ->setCellValue('B1', 'Año')
                           ->setCellValue('C1', 'Semestre')
                           ->setCellValue('D1', 'Oficio No')
                           ->setCellValue('E1', 'Periodo')
                           ->setCellValue('F1', 'Nombre')
                           ->setCellValue('G1', 'Matricula')
                           ->setCellValue('H1', 'Carrera')
                           ->setCellValue('I1', 'Fecha de Acreditación')
                           ->setCellValue('J1', 'Idioma')
                           ->setCellValue('K1', 'Nivel');

              //Auto tamano en las columnas
              $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
              $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
              $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
              $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
              $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
              $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
              $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

              //Colores Filas
               $objPHPExcel->getActiveSheet()
                      ->getStyle('A1:K1')
                      ->getFill()
                      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                      ->getStartColor()
                      ->setRGB('99FFCC');
              //Color Fotns..
              $objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFont()->setBold(true)
                                ->setName('Verdana')
                                ->setSize(10)
                                ->getColor()->setRGB('6F6F6F');

                                $objPHPExcel->getActiveSheet(0)->getStyle('A1:K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                          $i = 2;
                          while ($renglon = mysqli_fetch_array($Result_Ver_Acreditaciones))
                             {

                               $objPHPExcel->setActiveSheetIndex(0)
                                           ->setCellValue("A$i",$renglon['No_Lote'])
                                           ->setCellValue("B$i", $renglon['Ano_Acreditacion'])
                                           ->setCellValue("C$i", $renglon['Semestre_Alumno'])
                                           ->setCellValue("D$i", $renglon['No_Oficio'])
                                           ->setCellValue("E$i", $renglon['Periodo'])
                                           ->setCellValue("F$i", $renglon['Nombre_Alumno'])
                                           ->setCellValue("G$i", $renglon['Matricula_Acreditacion'])
                                           ->setCellValue("H$i", $renglon['Carrera_Alumno'])
                                           ->setCellValue("I$i", $renglon['Fecha_Acreditacion'])
                                           ->setCellValue("J$i", $renglon['Idioma'])
                                           ->setCellValue("K$i", $renglon['Nivel_Acreditacion']);
                                           //Alinear todas las celdas
                                           $objPHPExcel->getActiveSheet(0)->getStyle("A$i:K$i")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                           $i++;
                             }

//generar archivo de excel
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$objWriter->save('php://output');

 ?>
