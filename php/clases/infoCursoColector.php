<?php
include_once('colector.php');
include_once ('infoCurso.php');
class InfocursoColector{
    private $worker=NULL;

    public function __construct(){
        $this->worker= new Colector();
    }

    public function getInfocursoById($id){

        return $this->worker->getById($id,"info_curso","id_curso",Info_curso::class);
    }


    public function addInfoCurso($id_curso,$descripcion,$cupo_min,$cupo_max,$cupos_disponibles,$fecha_inicio,$fecha_fin){
        $query= "INSERT INTO info_curso(id_curso,descripcion,cupo_min,cupo_max,cupos_disponibles,fecha_inicio,fecha_fin) VALUES ($id_curso,\"$descripcion\",$cupo_min,$cupo_max,$cupos_disponibles,\"$fecha_inicio\",\"$fecha_fin\")";

        $result=$this->worker->execQuery($query);
        if($result!==null){
         return $this->getInfocursoById($id_curso);
        }

        return null;
    }
    public function updateInfoCurso($id_curso,$descripcion,$cupo_min,$cupo_max,$cupos_disponibles,$fecha_inicio,$fecha_fin)
    {
      $query="UPDATE info_curso SET descripcion=$descripcion, cupo_min=$cupo_min, cupo_max=$cupo_max, cupos_disponibles=$cupos_disponibles, fecha_inicio=$fecha_inicio, fecha_fin=$fecha_fin WHERE id_curso=$id_curso";
      $result=$this->worker->execQuery($query);
      return $result!==null;
    }
    public function deleteInfoCurso($id){
      $query="DELETE FROM info_curso WHERE id_curso=$id";
      $result=$this->worker->execQuery($query);
      if($result!==null){
        return true;
      }
      else{
        return false;
      }
    }
}
?>
