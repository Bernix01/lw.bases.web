<?php
<<<<<<< HEAD
	include_once('colector.php');
	include_once ('emprendimiento.php');
	class EmprendimientoColector{
		private $worker=NULL;

		public function __construct(){
			$this->worker= new Colector();
		}

		public function getEmprendimientoById($id){
			$query= "SELECT * FROM emprendimiento WHERE emprendimiento.id_emprendimiento=".$id." limit 1";
			$result=$this->worker->query($query);
			if($result!==NULL){
				$data=mysqli_fetch_object($result,'Emprendimiento');//count(array(?)
				return $data;
			}
			return NULL;
		}

		public function addEmprendimiento($emprendimiento){
			$query= "INSERT INTO emprendimiento VALUE (DEFAULT(),$emprendimiento->get_nombre_emp(),$emprendimiento->get_descripcion_emp(); SELECT LAST_INSERT_ID();";
			$result=$this->worker->query($query);
			$nuevo_id = (mysqli_fetch_assoc($result));
			$curso->set_id_emprendimiento($nuevo_id["id_emprendimiento"]);
			return $emprendimiento;
		}
	}
?>
=======
include_once('colector.php');
include_once ('Emprendimiento.php');
  class EmprendimientoColector{
    private $worker=NULL;

    public function __construct(){
      $this->worker= new Colector();
    }

    public function getEmprendimientoById($id){
      $query= "SELECT * FROM emprendimiento WHERE id_emprendimiento=".$id." limit 1";
      $result=$this->worker->query($query);
      if($result!==NULL){
        $data=mysqli_fetch_assoc(); //count(array)(?)
        $emprendimiento = new emprendimientoUsuario();
        $emprendimiento->set_id_estudiante($data['id_estudiante']);
        $emprendimiento->set_nombre($data['nombre']);
        $emprendimiento->set_descripcion($data['descripcion']);
        $emprendimiento->set_id_emprendimiento($data['id_emprendimiento']);
        return $emprendimiento;
      }
      return NULL;
    }

    public function getEmprendimientosByStudentId($id){
      $query="SELECT * FROM emprendimiento WHERE id_estudiante=$id";
      $result=$this->worker->query($query);
      if($result!==null){
        $emprendimientos=array();
        while($data=mysqli_fetch_object($result)){
          array_push($emprendimientos,$data);
        }
        return $emprendimientos;
      }
      return null;
    }

    public function addEmprendimiento($id_estudiante,$nombre,$descripcion)
    {
      $emp=new Emprendimiento(null,$id_estudiante,$nombre,$descripcion);
      $query="INSERT INTO emprendimiento(id_estudiante,nombre,descripcion) VALUES ($id_estudiante,$nombre,$descripcion)";
      //SELECT LAST_INSERT_ID();";
      $result=$this->worker->query($query);
      if($result!==null){
        $nuevo_id = (mysqli_fetch_assoc($result));
        $emp->set_id_emprendimiento($nuevo_id["id_emprendimiento"]);
        return $emp;
      }
      return null;
    }

    public public function updateEmprendimiento($id,$id_estudiante,$nombre,$descripcion)
    {
      $query="UPDATE emprendimiento SET nombre=$nombre, descripcion=$descripcion WHERE id_emprendimiento=$id";
      $result=$this->worker->query($query);
      return $result!==null;
    }
    public function deleteEmprendimiento($id){
      $query="DELETE FROM emprendimiento WHERE id_emprendimiento=$id";
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
>>>>>>> origin/master
