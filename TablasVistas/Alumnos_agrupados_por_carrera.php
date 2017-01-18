<?php

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);

//VER ALUMNOS DE CONTABILIDAD
$verConta = "SELECT * FROM ALUMNOS WHERE Carrera_Alumno = 'Licenciado en Contaduría'";
$resultConta = $mysqli->query($verConta);

//VER ALUMNOS DE ADMINISTRACION
$verLae = "SELECT * FROM ALUMNOS WHERE Carrera_Alumno = 'Licenciado en Administración de Empresas'";
$resultLae = $mysqli->query($verLae);

//VER ALUMNOS DE MERCADOTECNIA
$verMerca = "SELECT * FROM ALUMNOS WHERE Carrera_Alumno = 'Licenciado en Mercadotecnia'";
$resultMerca = $mysqli->query($verMerca);

//VER ALUMNOS DE TURISMO
$verTurismo = "SELECT * FROM ALUMNOS WHERE Carrera_Alumno = 'Licenciado en Gestión Turística'";
$resultTurismo = $mysqli->query($verTurismo);

//VER ALUMNOS DE NEGOCIOS
$verNegocios = "SELECT * FROM ALUMNOS WHERE Carrera_Alumno = 'Licenciado en Negocios Internacionales'";
$resultNegocios = $mysqli->query($verNegocios);

//VER ALUMNOS DE INFORMATICA
$verInfo = "SELECT * FROM ALUMNOS WHERE Carrera_Alumno = 'Licenciado en Informática'";
$resultInfo = $mysqli->query($verInfo);

  //Comprobar la conexion a la base de datos
  if ($mysqli->connect_errno)
  {
    echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
    echo "conexion con exito";

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alumnos</title>
    <link rel="stylesheet" href="../css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
  </head>
  <body>  <!-- Cuerpo de la pagina-->
    <div class="container"> <!-- Centrar todas las tablas AJUSTAR-->
        <div class="page-header">  <!-- Encabezado Ajustado-->
          <h1>ALUMNOS<small> Agrupados por carrera</small></h1>
        </div>
 <!-- ################ TABLAS ############################-->
    <div class="row"> <!-- Ajustar-->
    <table class="table table-hover"> <!-- Tabla con efecto al pasar el mouse sobre un registro-->

<!-- ################ C O N T A B I L I D A D############################-->
      <thead>
        <tr>
          <th class="bg-success" colspan="7">Contabilidad</th>
        </tr>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Matricula</th>
          <th class="text-center">Nombre</th>
          <th class="text-center">Carrera</th>
          <th class="text-center">Semestre</th>
          <th class="text-center"></th>
          <th class="text-center"></th>
        </tr>
      </thead>
      <tbody> <!-- Inicio Cuerpo de la Tabla de Contabilidad -->
        <!-- CODIGO PHP CON CODIGO HTML-->
        <?php while ( $renglon = mysqli_fetch_array($resultConta)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
        <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
        <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Id_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Matricula_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td><a class="btn btn-success" role ="button" href="../FormsEditar/Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
            <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
          </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
          <?php }?>
      </tbody> <!-- Final Cuerpo de la Tabla de Contabilidad -->
      <thead> <!-- Inicio Cabecera para dividir la tabla de la otra tabla-->
        <tr>
          <th class="bg-success" colspan="7"></th>
        </tr>
      </thead> <!-- Final Cabecera para dividir la tabla de la otra tabla-->

<!-- ################ A D M I N I S T R A C I O N ############################-->
      <thead>
        <tr>
          <th class="bg-danger" colspan="7">Administración</th>
        </tr>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Matricula</th>
          <th class="text-center">Nombre</th>
          <th class="text-center">Carrera</th>
          <th class="text-center">Semestre</th>
          <th class="text-center"></th>
          <th class="text-center"></th>
        </tr>
      </thead>
      <tbody> <!-- Inicio Cuerpo de la Tabla De Administracion-->
        <!-- CODIGO PHP CON CODIGO HTML-->
        <?php while ( $renglon = mysqli_fetch_array($resultLae)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
        <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
        <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Id_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Matricula_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <td><a class="btn btn-success" role ="button" href="../FormsEditar/Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
            <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
          </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
          <?php } // Final del ciclo?>
        </tbody> <!-- Final Cuerpo de la pagina De Administracion -->
        <thead> <!-- Inicio Cabecera para dividir la tabla de la otra tabla-->
          <tr>
            <th class="bg-danger" colspan="7"></th>
          </tr>
        </thead> <!-- Final Cabecera para dividir la tabla de la otra tabla-->

<!-- ################ M E R C A D O T E C N I A ############################-->
        <thead>
          <tr>
            <th class="bg-warning" colspan="7">Mercadotecnia</th>
          </tr>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Matricula</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Carrera</th>
            <th class="text-center">Semestre</th>
            <th class="text-center"></th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody> <!-- Inicio Cuerpo de la Tabla De Mercadotecnia-->
          <!-- CODIGO PHP CON CODIGO HTML-->
          <?php while ( $renglon = mysqli_fetch_array($resultMerca)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
          <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
          <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td class="text-center"><?php echo $renglon['Id_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td class="text-center"><?php echo $renglon['Matricula_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <td><a class="btn btn-success" role ="button" href="../FormsEditar/Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
              <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
            </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
            <?php }?>
          </tbody> <!-- Final Cuerpo de la pagina De Mercadotecnia -->
          <thead> <!-- Inicio Cabecera para dividir la tabla de la otra tabla-->
            <tr>
              <th class="bg-warning" colspan="7"></th>
            </tr>
          </thead> <!-- Final Cabecera para dividir la tabla de la otra tabla-->

<!-- ################ G E S T I O N - T U R I S T I C A ############################-->
          <thead>
            <tr>
              <th class="bg-primary" colspan="7">Gestión Turística</th>
            </tr>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Matricula</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Carrera</th>
              <th class="text-center">Semestre</th>
              <th class="text-center"></th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody> <!-- Inicio Cuerpo de la Tabla De Gestión Turística-->
            <!-- CODIGO PHP CON CODIGO HTML-->
            <?php while ( $renglon = mysqli_fetch_array($resultTurismo)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
            <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
            <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Id_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Matricula_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <td><a class="btn btn-success" role ="button" href="../FormsEditar/Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
                <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
              </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
              <?php }?>
            </tbody> <!-- Final Cuerpo de la pagina De Gestión Turística -->
            <thead> <!-- Inicio Cabecera para dividir la tabla de la otra tabla-->
              <tr>
                <th class="bg-primary" colspan="7"></th>
              </tr>
            </thead> <!-- Final Cabecera para dividir la tabla de la otra tabla-->

<!-- ################ N E G O C I O S  - I N T E R N A C I O N A L E S ############################-->
            <thead>
              <tr>
                <th class="success" colspan="7">Negocios Internacionales</th>
              </tr>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Matricula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Carrera</th>
                <th class="text-center">Semestre</th>
                <th class="text-center"></th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody> <!-- Inicio Cuerpo de la Tabla De Negocios Internacionales-->
              <!-- CODIGO PHP CON CODIGO HTML-->
              <?php while ( $renglon = mysqli_fetch_array($resultNegocios)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
              <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
              <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Id_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Matricula_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <td><a class="btn btn-success" role ="button" href="../FormsEditar/Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
                  <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
                </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                <?php }?>
              </tbody> <!-- Final Cuerpo de la pagina De Negocios Internacionales -->
              <thead> <!-- Inicio Cabecera para dividir la tabla de la otra tabla-->
                <tr>
                  <th class="success" colspan="7"></th>
                </tr>
              </thead> <!-- Final Cabecera para dividir la tabla de la otra tabla-->


<!-- ################ I N F O R M A T I C A ############################-->
              <thead>
                <tr>
                  <th class="info" colspan="7">Informática</th>
                </tr>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Matricula</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Carrera</th>
                  <th class="text-center">Semestre</th>
                  <th class="text-center"></th>
                  <th class="text-center"></th>
                </tr>
              </thead>
              <tbody> <!-- Inicio Cuerpo de la Tabla De Informática-->
                <!-- CODIGO PHP CON CODIGO HTML-->
                <?php while ( $renglon = mysqli_fetch_array($resultInfo)){?> <!-- Ciclo para sacar los datos del array y para crear filas -->
                <meta charset="utf-8"> <!--Para poder usar todos los caracteres en los registros-->
                <tr> <!-- INICIO Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                    <td class="text-center"><?php echo $renglon['Id_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                    <td class="text-center"><?php echo $renglon['Matricula_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                    <td class="text-center"><?php echo $renglon['Nombre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                    <td class="text-center"><?php echo $renglon['Carrera_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                    <td class="text-center"><?php echo $renglon['Semestre_Alumno']?></td> <!-- Campos de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                    <td><a class="btn btn-success" role ="button" href="../FormsEditar/Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Editar</a></td> <!-- Boton Editar estilo bootsrap primary azul-->
                    <td><a class="btn btn-danger" role="button" href="../BibliotecaPHP/Eliminar_Alumnos.php?Matricula_Alumno=<?php echo $renglon['Matricula_Alumno'];?>"> Eliminar</a></td> <!-- Boton Eliminar estilo bootsrap Danger rojo-->
                  </tr> <!-- FINAL Fila de la tabla que se crearan dependiendo de la cantidad de registros que existan en el array -->
                  <?php }?>
                </tbody> <!-- Final Cuerpo de la pagina De Informática -->
                <thead> <!-- Inicio Cabecera para dividir la tabla de la otra tabla-->
                  <tr>
                    <th class="info" colspan="7"></th>
                  </tr>
                </thead> <!-- Final Cabecera para dividir la tabla de la otra tabla-->

  </table>
  </div>
  </div> <!-- Container -->
  </body>
</html>
