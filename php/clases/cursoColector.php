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
      $query="call getAllCursos";
      return $this->worker->execQueryArray($query,Curso::class);
    }
    public function contar(){
      $query="call contarCursos";
      $result=$this->worker->execQueryReturning1($query,"COUNT(curso.id_curso)");
      return $result;
    }
    public function buscarCurso($cadena){
      $query="call buscarCurso(\"$cadena\")";
      return $this->worker->execQueryArray($query);
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
        $result = $this->worker->execQueryReturning($query, Curso::class);
        return $result;
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
    public function getCursosByStudentId($id_estudiante){
      $query="call getCursosByStudentId(\"$id_estudiante\")";
      $result=$this->worker->execQueryArray($query);
      $cursos=array();
      foreach ($result as $curso) {
        array_push($cursos,$curso);
      }
      return $cursos;
    }
    public function getCursosByProfId($id){
      $query="call getCursosByProfId(\"$id\")";
      $result=$this->worker->execQueryArray($query);
      $cursos=array();
      foreach ($result as $curso) {
        array_push($cursos,$curso);
      }
      return $cursos;
    }
    public function getEstudiantesByCurso($id_curso){
      $query="call getEstudiantesByCurso($id_curso)";
      $result=$this->worker->execQueryArray($query);
      $estudiantes=array();
      foreach ($result as $est) {
        array_push($estudiantes,$est);
      }
      return $estudiantes;
    }
    public function addEstudianteAcurso($id_estudiante,$id_curso){
      $query="call addEstudianteAcurso(\"$id_estudiante\",$id_curso)";
      $result=$this->worker->execQuery($query);
      return $result;
    }
    public function getCursosEstudiantes($ide,$idc){
      $query="call getCursosEstudiantes(\"$ide\",$idc)";
      $result=$this->worker->execQueryReturning($query);
      return $result->num_cursos;
    }
}

?>
