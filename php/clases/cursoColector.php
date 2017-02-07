<?php
include_once('colector.php');
include_once('curso.php');

class CursoColector
{
    private $worker = NULL;

    public function __construct()
    {
        $this->worker = new Colector();
    }

    public function getAll()
    {
        return $this->worker->read("curso", Curso::class);
    }

    public function getCursoById($id_curso){
      $query= "call getCursoById($id_curso)";
      $result=$this->worker->execQueryReturning($query,Curso::class);
      return $result;
    }
    public function getCursoAndInfoById($id_curso){
      $query= "call getCursoAndInfoById($id_curso)";
      $result=$this->worker->execQueryReturning($query);
      return $result;
    }

    public function addCurso(Curso $curso)
    {
        $query = "INSERT INTO curso VALUE (DEFAULT,\"" . $curso->getNombre() . "\"," . $curso->getCosto() . ")";
        $result = $this->worker->execQuery($query);

        if ($result !== null) {
            return $this->getCursoById($this->worker->getLastID());
        }
        return null;
    }

    public function updateCurso($id, $nombre, $costo)
    {
        $query = "UPDATE curso SET nombre=\"$nombre\", costo=$costo WHERE id_curso=$id";
        return $this->worker->execQuery($query);
    }

    public function deleteCurso($id)
    {
        $query = "DELETE FROM curso WHERE id_curso=$id";
        $result = $this->worker->execQuery($query);
        return $result;
    }
    public function getCursosByIds($lista_ids){
        $query="call getCursosByIds($lista_ids)";
        $result=$this->worker->execQueryArray($query);
        return $result;
    }
}

?>
