<?php

include_once('colector.php');
include_once ('emprendimiento.php');

  class EmprendimientoColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }
    public function getAll()
    {
      $query="call getAllEmprendimientos";
      return $this->worker->execQueryArray($query,Emprendimiento::class);
    }
    public function getEmprendimientoById($id){
      $query= "call getEmprendimientoById(\"$id\")";
      $result=$this->worker->execQueryReturning($query,Emprendimiento::class);

      return $result;
    }

    public function getEmprendimientosByStudentId($id){
      $query="call getEmprendimientosByStudentId( \"$id\")";
      $result=$this->worker->execQueryArray($query,Emprendimiento::class);
      $lista_emps=array();
      foreach($result as $emp){
        array_push($lista_certis,$emp);
      }
      return $lista_emps;
    }

    public function addEmprendimiento($id_estudiante,$nombre,$descripcion)
    {
      $emp=new Emprendimiento(null,$id_estudiante,$nombre,$descripcion);
      $query="call addEmprendimiento(\"$id_estudiante\",\"$nombre\",\"$descripcion\")";
      //SELECT LAST_INSERT_ID();";
      $result=$this->work->execQuery($query);
      return $result;
    }

    public function updateEmprendimiento($id,$id_estudiante,$nombre,$descripcion)
    {
      $query="call updateEmprendimiento($id,\"$id_estudiante\",\"$nombre\",\"$descripcion\")";
      $result=$this->worker->execQuery($query);
      return $result;
    }
    public function deleteEmprendimiento($id){
      $query="call deleteEmprendimiento($id)";
      $result=$this->worker->execQuery($query);
      return $result;
    }
  }
?>
