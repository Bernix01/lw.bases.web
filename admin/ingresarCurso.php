<?php
include_once("../php/clases/cursoColector.php");

$curso_colector= new CursoColector();
session_start();
if(!(isset($_SESSION["rol"])) && $_SESSION["rol"] != 2){
  header("location: /login.html");
  die();
}

//if connection is not successful you will see text error
if ($curso_colector===null) {
       die('Could not connect: ' . mysql_error());
}
if(isset($_POST['nombre']) && isset($_POST['costo']) && isset($_POST['descripcion']) && isset($_POST['cupo_min']) && isset($_POST['cupo_max']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])){
    $curso= new Curso(null,$_POST['nombre'],$_POST['costo']);
    $resultado= $curso_colector->addCurso($curso);
}
else{



?>
<html>
<head>no importa</head>
<body>
<div class="form">
  <form class="create-course-form" name="create-course-form">
  <input type="text" name="nombre" placeholder="nombre" required="required"/>
  <input type="number" name="cupo_min" placeholder="cupo mínimo"  required="required"pattern="-?[0-9]*(\.[0-9]+)?" min="0" max="99"/>
  <input type="number" name="cupo_max" placeholder="cupo máximo" required="required" pattern="-?[0-9]*(\.[0-9]+)?" min="0" max="99"/>
  <input type="text" name="costo" placeholder="costo" maxlength="6" required="required"/>
  <input type="text" name="descripcion" placeholder="Descripción del curso">
  <label>Horario inicio</label>
<input type="date" name="fecha_inicio" value="2016-04-12" min="<?php echo (new DateTime())->format('YYYY-mm-dd');?>" >
<label>Horario fin</label>
<input type="date" name="fecha_fin" value="2016-04-12" min="<?php echo (new DateTime())->format('YYYY-mm-dd');?>" >
  <!-- Imagen de un "+" para desplegar más horarios
  <img src="media/1481019034_add.png">      -->
  <div id="horario">
  <!--pide horario-->
  <label>Horario inicio</label>
<input type="datetime-local" name="horarios[0][inicio]" value="2016-04-12 23:20" min="<?php echo (new DateTime())->format('YYYY-mm-dd H:i');?>" >
<label>Horario fin</label>
<input type="datetime-local" name="horarios[0][fin]" value="2016-04-12 23:20" min="<?php echo (new DateTime())->format('YYYY-mm-dd H:i');?>" >
</div>
<button onclick="agregarHorario()" > Agregar horario </button>

<button type="submit">Crear curso</button>


</div>
</form>
</div>

<script type="text/javascript">
  var indice=1;
  function agregarHorario(){
    $('#horario').append("<label>Horario inicio</label><input type=\"datetime-local\" name=\"horarios["+indice+"][inicio]\" value=\"2016-04-12 23:20\" min=\"2016-12-01 23:20\" ><label>Horario fin</label><input type=\"datetime-local\" name=\"horarios["+indice+"][fin]\" value=\"2016-04-12 23:20\" min=\"2016-12-01 23:20\" >");
  indice++;
  }
</script>
</body>
</html>
<?php  }
