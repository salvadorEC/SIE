<?php
###################################################################################################
# Hacer la consulta la base de datos y mostrar la acreditacion o registro que se quiere actualizar#
# y mostrarlo en un FORM.                                                                         #
###################################################################################################

// Incluir configuracion para conectar a la base de datos
include "../configuracion.php";

//Conectar a la base de datos
$mysqli = new mysqli($SERVIDOR,$USER,$PASS,$BD);
$acentos = $mysqli->query("SET NAMES 'utf8'");

$Id_Acreditacion = $_GET['Id_Acreditacion'];

//SELECT TABLA ACREDITACIONES MOSTRAR: EL REGISTRO QUE SE DESEA ACTUALIZAR

$Ver_Acreditaciones= "SELECT Id_Acreditacion,No_Lote,Ano_Acreditacion,No_Oficio,Periodo,Fecha_Acreditacion,Matricula_Acreditacion,Nombre_Alumno,Idioma,Nivel_Acreditacion,Docs_Acreditacion FROM $ACREDITACIONES JOIN $ALUMNOS ON  Matricula_Alumno = Matricula_Acreditacion  WHERE Id_Acreditacion = '$Id_Acreditacion' ";
$Result_Ver_Acreditaciones = $mysqli->query($Ver_Acreditaciones);

//Guardar el resiultado en un array
$row = $Result_Ver_Acreditaciones->fetch_assoc();


//Comprobar la conexion a la base de datos
if ($mysqli->connect_errno) {
    echo "Fallo al conectar al servidor: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
 ?>

 <html>
   <head>
     <meta charset="utf-8">
     <title>Alta Acreditacion</title>
     <link rel="stylesheet" href="../includes/css/bootstrap.css"> <!-- Mandar Llamar Bootstrap-->
   </head>
   <body>
     <!--####### TITULO DE LA PAGINA ####### -->
     <div class="jumbotron">
       <h2>Registrar Acreditación</h2>
     </div>
    <!-- ########### F O R M U L A R I O - A L T A - A C R E D I T A C I O N #########-->
     <div class="container">
       <form class="form-horizontal" action="../BibliotecaPHP/Update_Asignar_Lotes_Fechas_Acreditaciones.php" method="post">

        <div class="row">
          <!--#### No_Lote #### -->
          <label class="control-label col-sm-2">No. Lote</label>
            <div class="col-sm-2">
              <select class="form-control" type="text" name="No_Lote">
                <option>LOTE 1</option>
                <option>LOTE 2</option>
                <option>LOTE 3</option>
                <option>LOTE 4</option>
                <option>LOTE 5</option>
                <option>LOTE 6</option>
                <option>LOTE 7</option>
                <option>LOTE 8</option>
                <option>LOTE 9</option>
                <option>LOTE 10</option>
                <option>LOTE 11</option>
                <option>LOTE 12</option>
                <option>LOTE 13</option>
                <option>LOTE 14</option>
                <option>LOTE 15</option>
                <option>LOTE 16</option>
                <option>LOTE 17</option>
                <option>LOTE 18</option>
                <option>LOTE 19</option>
                <option>LOTE 20</option>
                <option>LOTE 21</option>
                <option>LOTE 22</option>
                <option>LOTE 23</option>
                <option>LOTE 24</option>
                <option>LOTE 25</option>
                <option>LOTE 26</option>
                <option>LOTE 27</option>
                <option>LOTE 28</option>
                <option>LOTE 29</option>
                <option>LOTE 30</option>
                <option>LOTE 31</option>
                <option>LOTE 32</option>
                <option>LOTE 33</option>
                <option>LOTE 34</option>
                <option>LOTE 35</option>
                <option>LOTE 36</option>
                <option>LOTE 37</option>
                <option>LOTE 38</option>
                <option>LOTE 39</option>
                <option>LOTE 40</option>
                <option>LOTE 41</option>
                <option>LOTE 42</option>
                <option>LOTE 43</option>
                <option>LOTE 44</option>
                <option>LOTE 45</option>
                <option>LOTE 46</option>
                <option>LOTE 47</option>
                <option>LOTE 48</option>
                <option>LOTE 49</option>
                <option>LOTE 50</option>
                <option>LOTE 51</option>
                <option>LOTE 52</option>
                <option>LOTE 53</option>
                <option>LOTE 54</option>
                <option>LOTE 55</option>
                <option>LOTE 56</option>
                <option>LOTE 57</option>
                <option>LOTE 58</option>
                <option>LOTE 59</option>
                <option>LOTE 60</option>
                <option>LOTE 61</option>
                <option>LOTE 62</option>
                <option>LOTE 63</option>
                <option>LOTE 64</option>
                <option>LOTE 65</option>
                <option>LOTE 66</option>
                <option>LOTE 67</option>
                <option>LOTE 68</option>
                <option>LOTE 69</option>
                <option>LOTE 70</option>
              </select>

            </div>
             <!--####### No_Oficio ####### -->
          <label class="control-label col-sm-2">No. Oficio </label>
            <div class="col-sm-2">
              <input class="form-control" type="number" name="No_Oficio" placeholder="Numero De Oficio" required="required">
           </div>
           <!--####### Periodo ####### -->
          <label class="control-label col-sm-2">Periodo </label>
            <div class="col-sm-2">
              <label class="form-control"><?php echo $row['Periodo']?></label>
              <input type="hidden" name="Periodo" value="<?php echo $row['Periodo']?>">
            </div>

        </div>
        <br>
         <!--####### Fecha_Acreditacion ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2">Fecha De Acreditación </label>
           <div class="col-sm-10">
             <input class="form-control" type="date" name="Fecha_Acreditacion" required="required">
           </div>
         </div>
         <!--####### Matricula_Acreditacion ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Alumno </label>
           <div class="col-sm-10">
             <label class="form-control"><?php echo $row['Nombre_Alumno'] ?></label>
             <input type="hidden" name="Matricula_Acreditacion" value="<?php echo $row['Matricula_Acreditacion'] ?>">
           </div>
         </div>
         <!-- ############### Version 1.0.1 AJAX APARECER NOMBRE, CARRERA, SEMESTRE, ALUMNO ######## -->

         <!--####### Idioma ####### -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Idioma </label>
           <div class="col-sm-10">
             <label class="form-control"> <?php echo $row['Idioma']?> </label>
             <input type="hidden" name="Idioma" value="<?php echo $row['Idioma'] ?>">
           </div>
         </div>
         <!-- ############ Nivel_Acreditacion #######  -->
         <div class="form-group">
           <label class="control-label col-sm-2"> Nivel </label>
           <div class="col-sm-10">
             <label class="form-control"> <?php echo $row['Nivel_Acreditacion']?> </label>
             <input type="hidden" name="Nivel_Acreditacion" value="<?php echo $row['Nivel_Acreditacion'] ?>">
           </div>
         </div>
         <!-- ############ Docs #######  -->
         <input type="hidden" name="Docs_Acreditacion" value="<?php echo $row['Docs_Acreditacion'] ?>">
         <!-- ############ Ano_Acreditacion #######  -->
         <input type="hidden" name="Ano_Acreditacion" value="<?php echo $row['Ano_Acreditacion'] ?>">
         <!-- ############ Id_Acreditacion #######  -->
         <input type="hidden" name="Id_Acreditacion" value="<?php echo $row['Id_Acreditacion'] ?>">
       <!-- ######## GUARDAR ####### -->
       <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="btn btn-info btn-block">Guardar</button>
         </div>
       </div>

       </form>
     </div>
   </body>
 </html>
