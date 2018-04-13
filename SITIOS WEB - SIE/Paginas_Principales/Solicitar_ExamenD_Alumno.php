<!DOCTYPE html>
<html>
  <head>
    <head>
      <meta charset="utf-8">
      <title>Solicitar Examen Diagnostico</title>
      <link type="text/css" rel="stylesheet" href="../../SITIOS WEB - SIE/Estilos/Solicitar_examenes_diagnostico_alumnos.css">
      <link rel="stylesheet" href="../Includes/bootstrap.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
  </head>
  <body>

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
      <br>
      <nav id="btns-menu" class="col-sm-offset-10">
        <a href="../../SITIOS WEB - SIE/Paginas_Principales/Solicitar_ExamenD_Alumno.php?mensaje=Bienvenido" type="button" class="btn btn-primary">Actualizar</a>
      </nav>
    </header>

    <section class="container">

      <div class="">
        <img src="../../SITIOS WEB - SIE/images/Fechas_examenes_d.png" class="img-fluid" id="image-fecha" alt="Responsive image">
      </div>

      <div class="header-solicitar">
        <div class="text-solicitar">
          <h1>SOLICITAR EXAMEN</h1>
        </div>
      </div>

      <div class="body-solicitar">
        <div class="body-solicitar-info-1">
          <div class="body-text-info">
            <h3> 1.Ver las fechas disponibles que estan a la izquierda</h3>
          </div>
        </div>
        <div class="body-solicitar-info-2">
          <div class="body-text-info">
            <h3> 2.Decide la fecha y hora en que quieres hacer el examen</h3>
          </div>
        </div>
        <div class="body-solicitar-info-3">
          <div class="body-text-info">
            <h3> 3.Haz clic en el boton "Inscribirme" y elige la fecha y hora de registro a examen disponible</h3>
          </div>

          <div class="btn-inscripcion">
            <a  href="#" data-toggle="modal"  data-target="#modal-matricula" type="button" class="btn btn-danger">INSCRIBIRME</a>
          </div>

        </div>
        <?php
          // ############### MOSTRAR MENSAJES ########
         $mensaje = $_GET['mensaje'];


         if ($mensaje == "Bienvenido") { } ?>

        <?php if ($mensaje == "Alumno") {?>
          <div id ="mensaje" class="alert alert-danger">
            <strong>Alumno no Encontrado!</strong> Favor de pasar a coordinacion de idioma extranjero para que te den de alta.
          </div>
        <?php } ?>
        <?php if ($mensaje == "Pago") {?>
          <div id ="mensaje" class="alert alert-warning">
            <strong>Debes Pagar!</strong> Favor de pasar a coordinacion de idioma extranjero para realizar el pago.
          </div>
        <?php } ?>
        <?php


        if ($mensaje == "Exitoso") {
          $folio = $_GET['Folio'];
          $nombre = $_GET['Nombre'];
          ?>
          <div id ="mensaje" class="alert alert-info">
            <strong>Registro Exitoso!</strong> Haz quedado inscrito.

          </div>
          <div id ="mensaje" class="alert alert-default">

            <strong>Conserva Este Folio: <?php echo $folio; ?></strong>  <?php echo $nombre; ?>.
          </div>
        <?php } ?>



        <!-- ######## MODAL INGRESAR MATRICULA ###### -->
        <div class="modal fade" id="modal-matricula" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <!-- Cabecera del Modal-->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingresa tu matricula</h4>
              </div>
              <!-- Cuerpo del Modal-->
              <div class="modal-body">
              <!-- ############## FORMULARIO INGRESAR MATRICULA ########-->
                <form class="form-horizontal" action="../../BibliotecaPHP/Comprobar_Alta_Examen_Diagnostico_Sitio_Web.php" method="post">
                    <div class="form-group">
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                          <input class="form-control" type="text" name="Matricula_De_Comprobacion" required="required" placeholder="Ejemplo: 01134815">
                        </div>
                      </div>
                      <!-- ######## BOTON CONTINUAR #######-->
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" class="btn btn-danger btn-block">Continuar</button>
                      </div>
                    </div>
                  </div>
                  </form>
              </div>
            </div>




    </section>
    <footer id="footer">
      <div class="text-footer">
        <h3 id="row1">FACULTAD DE CIENCIAS</h3>
        <h3 id="row2">ADMINISTRATIVAS</h3>
        <h3 id="row3">COORDINACION</h3>
        <h3 id="row4">IDIOMA EXTRANJERO</h3>

      </div>
        <img id="image-footer" src="../../SITIOS WEB - SIE/images/FACULTAD DE CIENCIAS ADMINISTRATIVAS.png" class="img-fluid" id="image-fecha" alt="Responsive image">
        <img id="image-footer2" src="../../SITIOS WEB - SIE/images/ili.png" class="img-fluid" id="image-fecha" alt="Responsive image">

        <div class="linea-footer">

        </div>
    </footer>

  </body>
</html>
