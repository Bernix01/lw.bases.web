<?php
include_once('colector.php');
include_once ('curso.php');
class CursoColector{
    private $worker=NULL;

    public function __construct(){
        $this->worker= new Colector();
    }

    public function getCursoById($id){
        $query= "SELECT * FROM curso WHERE curso.id_curso=".$id." limit 1";
        $result=$this->worker->query($query);
        if($result!==NULL){
            $data=mysqli_fetch_object($result,'Curso'); //count(array)(?)
            return $data;
        }
        return NULL;
    }

    public function addCurso($curso){
        $query= "INSERT INTO curso VALUE (DEFAULT(),$curso->get_nombre(),$curso->get_costo()); SELECT LAST_INSERT_ID();";
        $result=$this->worker->query($query);
        $nuevo_id = (mysqli_fetch_assoc($result));
        $curso->set_id_curso($nuevo_id["id_curso"]);
        return $curso;
    }

    public function updateCurso($id,$nombre,$costo)
    {
      $query="UPDATE curso SET nombre=$nombre, costo=$costo WHERE id_curso=$id";
      $result=$this->worker->query($query);
      return $result!==null;
    }
    public function deleteCurso($value='')
    {
      $query="DELETE FROM curso WHERE id_curso=$id";
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
