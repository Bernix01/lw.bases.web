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
        $query = "call addCurso(\"".$curso->getNombre()."\",".$curso->getCosto().")";
        $result = $this->worker->execQuery($query);

        if ($result !== null) {
            return $curso; //falta agregarle el id al curso
        }
        return null;
    }

    public function updateCurso($id, $nombre, $costo)
    {
        $query = "call updateCurso($id,\"$nombre\",$costo)";
        return $this->worker->execQuery($query);
    }

    public function deleteCurso($id)
    {
        $query = "call deleteCurso($id)";
        $result = $this->worker->execQuery($query);
        return $result;
    }
    public function getCursosByUsuarioId($id_usuario){
      $query="call getCursosByUsuarioId(\"$id_usuario\")";
      $result=$this->worker->execQueryArray($query);
      return $result;

    }
}

?>
