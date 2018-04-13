<?php
// Incluir configuracion para conectar a la base de datos
  include "../../configuracion.php";

  //Conectar a la base de datos
  $mysqli = new mysqli($SERVIDOR, $USER, $PASS, $BD);
  $acentos = $mysqli->query("SET NAMES 'utf8'");

    //Comprobar la conexion a la base de datos
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    //SELECT TABLA ACREDITACIONES MOSTRAR: Acreditaciones WHERE x Fecha_Acreditacion - Nombre Alumno Ordenado alfabeticamente.

    $Ver_sitio_web_examenes_diagnostico = "SELECT * FROM $sitio_web_examenes_diagnostico ";

    $Result_Ver_sitio_web_examenes_diagnostico = $mysqli->query($Ver_sitio_web_examenes_diagnostico);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Examenes Diagnostico</title>
    <link type="text/css" rel="stylesheet" href="../Estilos/Examenes_diagnostico.css">
    <link rel="stylesheet" href="../Includes/bootstrap.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body class="body">

    <header class="header">
      <div class="logo-sie">
        <img src="../images/logo.png">
      </div>
      <div class="logo-text">
        <ul>
          <li>SISTEMA</li>
          <li>IDIOMA</li>
          <li>EXTRANJERO</li>
        </ul>
      </div>
      <!-- ##### BOTONES ######-->
      <nav id="btns-menu" class="col-sm-offset-9">
        <a href="../../SITIOS WEB - SIE/Paginas_Principales/Solicitar_ExamenD_Alumno.php?mensaje=Bienvenido?" type="button" class="btn btn-danger">Examenes Diagnostico</a> <a href="../../index.php" type="button" class="btn btn-primary">Menu</a>
      </nav>
    </header>

        <div class="container">
          <div>
            <h1 id="titulo-examen-d">Exámen De Ubicación Inglés</h1>
            <div class="linea-titulo-examen-d"> </div>
          </div>
          <!-- ######################### FECHAS EXAMENES  ###################### -->
          <div class="table-header-fecha-ed">
            <h4 id="fechas-d">FECHA DE EXAMEN</h4>
          </div>
          <!-- ######################### REGISTRO A EXAMEN ###################### -->
          <div class="table-header-registro-ed">
            <h4 id="fechas-d">REGISTRO A EXAMEN</h4>
          </div>
            <!-- ######################### HORARIOS  ###################### -->
          <div class="table-header-horarios-ed">
            <h4 id="fechas-d">HORARIOS</h4>
          </div>

          <!-- ########## TABLA FECHAS PUBLICADAS ####### -->
          <table  id="table-fechas-d">
            <?php

            // Funcion para tratar/convertir fechas..
              function multiexplode ($delimiters,$string) {

                  $ready = str_replace($delimiters, $delimiters[0], $string);
                  $launch = explode($delimiters[0], $ready);
                  return  $launch;
              }

              $cont = 0; // cont es para ver si existe un registro o no
            while ($row = mysqli_fetch_array($Result_Ver_sitio_web_examenes_diagnostico))
              {
                $cont++;// si no se incremete cont es igual a 0 entonces no existe ningun registro aun

                  $Fecha_RegistroED = $row['Fecha_RegistroED'];
                  $exploded = multiexplode(array("-","T"),$Fecha_RegistroED);

            ?>
            <tr>
              <td id="row-fecha-ed"><?php echo $FechaED = $row['Fecha_ED'];?></td>
              <td id="row-registro-ed"><?php echo "$exploded[2]/$exploded[1]/$exploded[0] ";?></td>
              <td id="row-horario-ed"><?php echo "$exploded[3] "; ?></td>
              <td><a id="row-eliminar-ed" class="btn btn-link" role="button" href="../../BibliotecaPHP/Sitio_Web_Eliminar_Fecha_ED.php?Id_Fecha_ED=<?php echo $row['Id_Fecha_ED'];?>">Eliminar</a></td>
            </tr>


            <?php /// ######## CONCATENAR LA FECHA ADD #########
            $dia = $exploded[2]+2;
            $mes = $exploded[1];
            $ano = $exploded[0];
            $hora = $exploded[3];
            //####### CONDICION PARA AGREGARLE UN CERO A LA IZQ SI EL DIA ES MENOR A 10
            if ($dia<10) {
              $FechaAdd = $ano."-".$mes."-0".$dia."T".$hora;
            }
            else
              $FechaAdd = $ano."-".$mes."-".$dia."T".$hora;
            } ?>

          </table>

          <?php
          //si no existe ningun registro entonces no muestra la opcion de Add..
              if ($cont==0)
              { echo ""; ?>

            <?php    }
              else {?>
              <!-- ####### AGREGAR FECHAS ADICIONAL ####### -->
              <div  class="col-sm-offset-2 col-sm-2">
                <form action="../../BibliotecaPHP/Sitio_Web_Alta_Fecha_ED.php" method="post">
                  <input type="hidden" name="Fecha_ExamenD" value="<?php echo $FechaED; ?>">
                  <input type="hidden" name="Fecha_RegistroED" value="<?php echo $FechaAdd ; ?>">
                  <button type="submit" class="btn btn-success btn-block" id="agregar_fecha">Add</button>
                </form>
              </div> <?php } ?>




          <!-- ####### BOTON ALTA FECHAS EXAMENES DIAGNOSTICO######-->
          <a  href="#" data-toggle="modal"  data-target="#myModal" type="button" id="btn-alta-fechaED" class="btn btn-danger">AGREGAR FECHAS</a>


          <!-- ######## MODAL ALTA FECHA EXAMEN DIAGNOSTICO ###### -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <!-- Cabecera del Modal-->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Fecha Examen Inglés</h4>
                </div>
                <!-- Cuerpo del Modal-->
                <div class="modal-body">
                <!-- ############## FORMULARIO ALTA FECHA EXAMEN DIAGNOSTICO ########-->
                  <form class="form-horizontal" action="../../BibliotecaPHP/Sitio_Web_Alta_Fecha_ED.php" method="post">
                      <!-- ######## FECHA Y HORA #######-->
                      <div class="form-group">
                        <div class="form-group">

                          <label class="control-label col-sm-2">Fecha de Examen</label>
                          <div class="col-sm-8">
                            <input class="form-control" type="text" name="Fecha_ExamenD" required="required" placeholder="Ejemplo: 21 Febrero (Martes)">
                          </div>
                        </div>
                        <label class="control-label col-sm-2">Fecha de Registro</label>
                        <div class="col-sm-8">
                          <input class="form-control" type="datetime-local" name="Fecha_RegistroED" required="required" >
                        </div>
                        <!-- ######## BOTON PUBLICAR FECHA #######-->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8"> <!-- Recorrer el boton dos columnas hacia la derecha y ancharlo 6 columnas-->
                          <button type="submit" class="btn btn-danger btn-block">Agregar</button>
                        </div>
                      </div>
                    </div>
                    </form>

                </div>
              </div>

            </div>
          </div>

          <!-- ####### MOSTRAR ALERTA DE REGISTRO EXITOSO #######-->
          <div id="element" style="display: none;">
             <!-- ####### DIV OCULTO#######-->
             <div  id="alert-registro-exitoso" class="alert alert-success alert-dismissable fade in">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Registrado!</strong> Fuiste Registrado Correctamente.
             </div>

          </div>
          <!-- ####### MOSTRAR Y OCULTAR FORM INSCRIBIRME #######-->
            <script type="text/javascript">

                  $("#hide").click(function()
                  {
                      $("#element").hide();
                    });
                      $("#btn-registrarme").click(function(){
                          $("#element").show();

                          });
            </script>


         <script type="text/javascript">

         </script>
        </div>
        <div id="footer">

        </div>
  </body>
</html>
