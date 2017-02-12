<?php
include_once('colector.php');
include_once ('infoCurso.php');
class InfocursoColector{
    private $worker=NULL;

    public function __construct(){
        $this->worker= new Colector();
    }

    public function getInfoCursoById($id){
      $query="call getInfoCursoById($id)";
      $result=$this->worker->execQueryReturning($query,Info_curso::class);
      return $result;
    }


    public function addInfoCurso($id_curso,$descripcion,$cupo_min,$cupo_max,$cupos_disponibles,$fecha_inicio,$fecha_fin){
        $query= "call addInfoCurso($id_curso,\"$descripcion\",$cupo_min,$cupo_max,$cupos_disponibles,\"$fecha_inicio\",\"$fecha_fin\")";
        $result=$this->worker->execQuery($query);
        return $result;
    }
    public function updateInfoCurso($id_curso,$descripcion,$cupo_min,$cupo_max,$cupos_disponibles,$fecha_inicio,$fecha_fin)
    {
      $query="call updateInfoCurso($id_curso,\"$descripcion\",$cupo_min,$cupo_max,$cupos_disponibles,\"$fecha_inicio\",\"$fecha_fin\")";
      $result=$this->worker->execQuery($query);
      return $result;
    }
    public function deleteInfoCurso($id){
      $query="call deleteInfoCurso($id)";
      $result=$this->worker->execQuery($query);
      return $result;
    }
}
?>
