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
        $query= "call addInfoCurso($id_curso,\"$descripcion\",$cupo_min,$cupo_max,$cupos_disponibles,\"$fecha_inicio\",\"$fecha_fin\")";
        $result=$this->worker->execQuery($query);
        if($result!==null){
         return $this->getInfocursoById($id_curso);
        }

        return null;
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
