<?php
/**
 * Created by PhpStorm.
 * User: gbern
 * Date: 02/02/17
 * Time: 12:26 PM
 */
session_start();
if (!isset($_SESSION))
    header("location: /");

require_once("php/clases/usuarioColector.php");
require_once("php/clases/infoUsuarioColector.php");
require_once("php/clases/cursoColector.php");
require_once("php/clases/certificadoColector.php");
require_once("php/clases/emprendimientoColector.php");

$colectorUsuario = new usuarioColector();
$colectorInfoUsuario = new InfoUsuarioColector();
$cursoColector = new CursoColector();
$certificado_colector= new CertificadoColector();
$emprendimiento_colector= new EmprendimientoColector();

$usuario = $colectorUsuario->getUserById($_SESSION["id"]);
$infousuario = $colectorInfoUsuario->getInfoUsuarioById($_SESSION["id"]);
$curso = $cursoColector->getCursosByStudentId($usuario->get_id_usuario());
$certificados=$certificado_colector->getCertificadosByStudentId($usuario->get_id_usuario());
$emprendimientos=$emprendimiento_colector->getEmprendimientosByStudentId($_SESSION["id"]);
$num_certificados=count($certificados);
$num_emprendimientos=count($emprendimientos);

?>

<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,200,300,800);
    @import url(http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);

    figure.snip0042 {
        font-family: 'Raleway', Arial, sans-serif;
        position: relative;
        float: left;
        overflow: hidden;
        margin: 0;
        min-width: 220px;
        max-width: 100%;
        width: 100%;
        background: #ffffff;
        color: #ffffff;
    }

    figure.snip0042 * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    figure.snip0042 > img {
        max-width: 100%;
    }

    figure.snip0042 figcaption {
        padding: 20px 30px 20px 25%;
        position: relative;
    }

    figure.snip0042 figcaption h2,
    figure.snip0042 figcaption p {
        margin: 0;
        text-align: right;
        padding: 10px 0;
        right: 0;
        width: 100%;
    }

    figure.snip0042 figcaption h2 {
        font-size: 1.3em;
        font-weight: 300;
        text-transform: uppercase;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    figure.snip0042 figcaption h2 span {
        font-weight: 800;
    }

    figure.snip0042 figcaption p {
        font-size: 0.9em;
        opacity: 0.8;
    }

    figure.snip0042 figcaption .icons {
        width: 100%;
        text-align: right;
    }

    figure.snip0042 figcaption .icons i {
        font-size: 26px;
        padding: 5px;
        color: #ffffff;
        top: 50%;
    }

    figure.snip0042 figcaption a {
        opacity: 0.3;
        -webkit-transition: opacity 0.35s;
        transition: opacity 0.35s;
    }

    figure.snip0042 figcaption a:hover {
        opacity: 0.8;
    }

    figure.snip0042 .position {
        width: 100%;
        text-align: right;
        padding: 8px 30px 13px;
        font-size: 0.8em;
        opacity: 1;
        color: #ffffff;

    }

    figure.snip0042:after {
        position: absolute;
        top: 0;
        left: -20%;
        height: 110%;
        width: 30%;
        background-color: #000000;
        content: '';
        border-right: 4px solid #ffffff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        -webkit-transform: skewX(-7deg) translateX(0px);
        transform: skewX(-7deg) translateX(0px);
        -webkit-backface-visibility: hidden;
        -webkit-transition: all 0.35s;
        transition: all 0.35s;
    }

    figure.snip0042.blue {
        background: #20638f;
    }

    figure.snip0042.blue:after {
        background: #164666;
    }

    figure.snip0042.red {
        background: #962d22;
    }

    figure.snip0042.red:after {
        background: #6d2018;
    }

    figure.snip0042.yellow {
        background: #bf6516;
    }

    figure.snip0042.yellow:after {
        background: #924d10;
    }

    figure.snip0042:hover:after,
    figure.snip0042.hover:after {
        -webkit-transform: skewX(-7deg) translateX(10px);
        transform: skewX(-7deg) translateX(10px);
    }

</style>
<figure class="snip0042 blue">
    <figcaption>
        <h2><?php echo $usuario->get_nickname(); ?> <span><?php echo $usuario->get_email(); ?></span></h2>
        <p><?php echo $infousuario->get_tag_line();?></p>
        <div class="icons">
            <a href="admin/cursosPorUsuario.php"<i class="ion-ios-home"><?php echo "Cursos: ".$infousuario->get_numero_cursos(); ?></i></a>
            <a href="admin/certificadosPorUsuario.php"><i class="ion-ios-email"><?php echo "Certificados: ".$num_certificados; ?></i></a>
            <a href="admin/emprendimientosPorUsuario.php"><i class="ion-ios-telephone"><?php echo "Emprendimientos: ".$num_emprendimientos;?></i></a>

        </div>
    </figcaption>
    <!-- <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample6.jpg" alt="sample6"/> -->

    <a href="index.php"><div class="position">Volver al menú principal</div></a>

</figure>
