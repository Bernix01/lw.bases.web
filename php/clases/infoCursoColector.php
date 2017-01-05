<?php
include_once('colector.php');
include_once ('info_curso.php');
class InfocursoColector{
    private $worker=NULL;

    public function __construct(){
        $this->worker= new Colector();
    }

    public function getInfoCursoById($id){
        $query= "SELECT * FROM info_curso WHERE id_curso=".$id." limit 1";
        $result=$this->worker->query($query);
        if($result!==NULL){
            $data=mysqli_fetch_object($result,'Info_curso'); //count(array)(?)
            return $data;
        }
        return NULL;
    }

    public function addInfoCurso($id_curso,$nombre,$descripcion,$cupo_min,$cupo_max,$cupos_disponibles,$fecha_inicio,$fecha_fin){
        $query= "INSERT INTO info_curso(cupo_min,cupo_max,cupos_disponibles,$echa_inicio,fecha_fin) VALUE ($id_curso,$infocurso->getDescripcion(),$infocurso->get_cupo_min(),$infocurso->get_cupo_max,$infocurso->get_cupos_disponibles(),$infocurso->get_fecha_inicio(),$infocurso->get_fecha_fin())";
        $result=$this->worker->query($query);
        if($result!==null){
          $data=mysqli_fetch_object($result,'Info_curso'); //count(array)(?)
          return $data;
        }

        return null;
    }
    public public function updateInfoCurso($id_curso,$nombre,$descripcion,$cupo_min,$cupo_max,$cupos_disponibles,$fecha_inicio,$fecha_fin)
    {
      $query="UPDATE info_curso SET descripcion=$descripcion, cupo_min=$cupo_min, cupo_max=$cupo_max, cupos_disponibles=$cupos_disponibles, fecha_inicio=$fecha_inicio, fecha_fin=$fecha_fin WHERE id_curso=$id_curso";
      $result=$this->worker->query($query);
      return $result!==null;
    }
    public function deleteInfoCurso($id){
      $query="DELETE FROM info_curso WHERE id_curso=$id";
      $result=$this->worker->query($query);
      if($result!==null){
        return true;
      }
      else{
        return false;
      }
    }
}
?>
