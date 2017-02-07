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
      return $this->worker->read("emprendimiento",Emprendimiento::class);
    }
    public function getEmprendimientoById($id){
      $query= "call getEmprendimientoById($id)";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_assoc(); //count(array)(?)
        $emprendimiento = new emprendimientoUsuario();
        $emprendimiento->set_id_estudiante($data['id_estudiante']);
        $emprendimiento->set_nombre($data['nombre']);
        $emprendimiento->set_descripcion($data['descripcion']);
        $emprendimiento->set_id_emprendimiento($data['id_emprendimiento']); //seleccionar ultimo id insertado
        return $emprendimiento;
      }
      return NULL;
    }

    public function getEmprendimientosByStudentId($id){
      $query="call getEmprendimientosByStudentId( \"$id\")";
      $result=$this->worker->query($query);
      if($result!==null){
        $emprendimientos=array();
        while($data=mysqli_fetch_object($result,"Emprendimiento")){
          array_push($emprendimientos,$data);
        }
        return $emprendimientos;
      }
      return null;
    }

    public function addEmprendimiento($id_estudiante,$nombre,$descripcion)
    {
      $emp=new Emprendimiento(null,$id_estudiante,$nombre,$descripcion);
      $query="call addEmprendimiento(\"$id_estudiante\",\"$nombre\",\"$descripcion\")";
      //SELECT LAST_INSERT_ID();";
      $result=$this->worker->query($query);
      if($result!==null){
        $nuevo_id = (mysqli_fetch_assoc($result));
        $emp->set_id_emprendimiento($nuevo_id["id_emprendimiento"]);
        return $emp;
      }
      return null;
    }

    public function updateEmprendimiento($id,$id_estudiante,$nombre,$descripcion)
    {
      $query="call updateEmprendimiento($id,\"$id_estudiante\",\"$nombre\",\"$descripcion\")";
      $result=$this->worker->query($query);
      return $result!==null;
    }
    public function deleteEmprendimiento($id){
      $query="call deleteEmprendimiento($id)";
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
