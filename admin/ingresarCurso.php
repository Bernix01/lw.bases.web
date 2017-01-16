<?php
ini_set("display_errors", 1);
include_once("../php/clases/cursoColector.php");
include_once("../php/clases/infoCursoColector.php");
include_once("../php/clases/horarioColector.php");

$curso_colector = new CursoColector();
$info_colector = new InfocursoColector();
$horario_colector = new HorarioColector();
$agregado = false;
$posted = false;
session_start();
if (!(isset($_SESSION["rol"])) || $_SESSION["rol"] != 2) {
    header("location: ../html/login.html");
    die();
}

//if connection is not successful you will see text error
if ($curso_colector == null || $info_colector == null) {
    die('Could not connect: ');
}
if (isset($_POST['nombre']) && isset($_POST['costo']) && isset($_POST['descripcion']) && isset($_POST['cupo_min']) && isset($_POST['cupo_max']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin']) && isset($_POST["horarios"])) {

    var_dump($_POST);
    $curso = new Curso(null, $_POST['nombre'], $_POST['costo']);
    $resultado = $curso_colector->addCurso($curso);
    if ($resultado) {
        var_dump($resultado);
        $resultado2 = $info_colector->addInfoCurso($resultado->get_id_curso(), $_POST['descripcion'], $_POST['cupo_min'], $_POST['cupo_max'], $_POST['cupo_max'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
        if ($resultado2) {
            var_dump($resultado2);
            foreach ($_POST["horarios"] as $horario) {
                $h = $horario_colector->addHorario(str_replace("T"," ",$horario["inicio"]),str_replace("T"," ",$horario["fin"]));
                var_dump($h);
                $b = $horario_colector->setCurso($h->get_id_horario(),$resultado);
                if(!$b) {
                    die("error al ingresar curso");
                }
            }

            header("location: listarCursos.php");
        }
    }
} else {


    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LW</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/admin/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/admin/dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">

        <?php
        include('../php/paginas/menu-admin.php');

        if ($posted) {
            if ($agregado)
                echo "<script type='text/javascript'>alert('¡Usuario agregado exitosamente!')</script>";
            else
                echo "<script type='text/javascript'>alert('¡No se pudo agregar el usuario!')</script>";
        }

        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Cursos
                    <small>Agregar</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Curso</a></li>
                    <li class="active">Crear nuevo curso</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Crear nuevo curso</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form class="create-course-form" name="create-course-form" role="form" method="post">
                                <div class="box-body">
                                    <div class="form-group">

                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" placeholder="nombre" class="form-control"
                                               required="required"/>
                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">cupo mínimo</label>
                                        <input type="number" name="cupo_min" class="form-control"
                                               placeholder="cupo mínimo"
                                               required="required"
                                               pattern="-?[0-9]*(\.[0-9]+)?" min="1" max="99"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">cupo máximo</label>

                                        <input type="number" name="cupo_max" class="form-control"
                                               placeholder="cupo máximo"
                                               required="required"
                                               pattern="-?[0-9]*(\.[0-9]+)?" min="1" max="99"/>

                                    </div>
                                    <div class="form-group">

                                        <label for="exampleInputEmail1">costo</label>
                                        <input type="text" name="costo" class="form-control" placeholder="costo"
                                               maxlength="6"
                                               required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">descripcion</label>
                                        <input type="text" name="descripcion" class="form-control"
                                               placeholder="Descripción del curso">
                                    </div>

                                    <div class="form-group">

                                        <label>Fecha inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-control"
                                               value="<?php echo (new DateTime())->format('Y-m-d'); ?>"
                                               min="<?php echo (new DateTime())->format('Y-m-d'); ?>">

                                        <label>Fecha fin</label>
                                        <input type="date" name="fecha_fin" class="form-control"
                                               value="<?php echo (new DateTime())->format('Y-m-d'); ?>"
                                               min="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                    </div>

                                    <div class="form-group">
                                        <div id="horario">
                                            <!--pide horario-->
                                            <label>Horario inicio</label>
                                            <input class="inicio" type="datetime-local" name="horarios[0][inicio]"
                                                   value="2016-04-12T23:20"
                                                   min="<?php echo (new DateTime())->format('Y-m-d H:i'); ?>">
                                            <br></br>
                                            <label>Horario fin</label>
                                            <input class="fin" type="datetime-local" name="horarios[0][fin]"
                                                   value="2016-04-12T23:20"
                                                   min="<?php echo (new DateTime())->format('Y-m-d H:i'); ?>">
                                        </div>
                                        <a href="#" onclick="agregarHorario()"> Agregar horario </a>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info">Crear curso</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
          
                </div>
                <script src="../js/jquery.js"></script>
                <script src="../js/jquery.validate.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
                <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
                <script src="../js/create-course-validation.js"></script>
                <script src="moment.js"></script>
                <script>
                    moment().format();
                    var f_inicio = document.getElementsByName("fecha_inicio").value;
                    var f_fin = document.getElementsByName("fecha_fin").value;
                    if (moment(f_fin).isBefore(f_inicio)) {
                        //La fecha de fin de curso está incorrecta
                    }
                    else {
                        var inicios = document.getElementsByClassName("inicio");
                        var fines = document.getElementsByClassName("fin");
                        var tam = len(inicios);
                        for (var i = 0; i < tam; i++) {
                            if (!(moment(inicios[i]).isBetween(f_inicio, f_fin, null, '[]'))) {
                                //la fecha inicial no está en el rango
                            }
                            else {
                                if (!(moment(fines[i]).isBetween(f_inicio, f_fin, null, '[]'))) {
                                    //la fecha final no está en el rango
                                }
                            }
                        }
                    }

                </script>
                <script type="text/javascript">
                    var indice = 1;
                    function agregarHorario() {
                        $('#horario').append("<br/><br/><label>Horario inicio</label><input type=\"datetime-local\"  class=\"inicio\"name=\"horarios[" + indice + "][inicio]\" value=\"2016-04-12T23:20\" min=\"<?php echo (new DateTime())->format('Y-m-d H:i');?>\" >   <br></br> <label>Horario fin</label><input class=\"fin\" type=\"datetime-local\" name=\"horarios[" + indice + "][fin]\" value=\"2016-04-12T23:20\" min=\"<?php echo (new DateTime())->format('Y-m-d H:i');?>0\" >");
                        indice++;
                        var f_inicio = document.getElementsByName("fecha_inicio")[0].value;
                        var f_fin = document.getElementsByName("fecha_fin")[0].value;
                        console.log(f_inicio);
                        var inicios = document.getElementsByClassName("inicio");
                        var fines = document.getElementsByClassName("fin");
                        var tam = inicios.length;
                    }
                    function validar(event) {
                        //event.preventDefault();


                        //return false;
                    }

                    //  $(document).ready(function () {
                    //      $("form[name='create-course-form']").on('submit',function (e) {
                    //          if(!valid)
                    //              return false;
                    //          return false;
                    //      });

                </script>
    </body>
    </html>
<?php }
