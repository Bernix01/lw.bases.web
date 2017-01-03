<?php
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