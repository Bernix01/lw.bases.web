<?php
include_once('colector.php');
include_once ('curso.php');
include_once ('usuario.php');

class CursoProfesorColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getCursosByUsuarioId($id_usuario){
      $query="Select curso.id_curso,curso.nombre,curso.costo,info_curso.descripcion,info_curso.cupos_disponibles,info_curso.cupo_min,info_curso.cupos_max,info_curso.fecha_inicio,info_curso.fecha_fin FROM usuario,curso,curso_profesor,info_curso WHERE usuario.id_usuario=curso_profesor.id_profesor and curso_profesor.id_curso=curso.id_curso and info_curso.id_curso=curso.id_curso and usuario.id_usuario=$id GROUP BY curso.id_curso";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $cursos=array();
        while($data=mysqli_fetch_assoc($result)){
          $curso=new Curso();
        }

        return $data;
      }
      return NULL;
    }
    }
  }
?>
