<?php
	class Emprendimiento{
		private $id_emprendimiento;
		private $nombre;
		private $descripcion;
		private $id_estudiante;

		public function __construct($id_emprendimiento=null,$id_estudiante=null,$nombre=null,$descripcion=null){
			if($id_emprendimiento!==null){
				$this->id_emprendimiento=$id_emprendimiento;
			}
			if($id_estudiante!==null){
				$this->id_estudiante=$id_estudiante;
			}
			if($nombre!==null){
				$this->nombre=$nombre;
			}
			if($descripcion!==null){
				$this->descripcion=$descripcion;
			}

		}

		public function get_id_emprendimiento(){
			return $this->id_emprendimiento;
		}
		public function set_id_emprendimiento($id_emprendimiento){
			$this->id_emprendimiento=$id_emprendimiento;
		}
		public function get_nombre(){
			return $this->nombre;
		}
		public function set_nombre($nombre){
			$this->nombre=$nombre;
		}
		public function get_descripcion(){
			return $this->descripcion;
		}
		public function set_descripcion($descripcion){
			$this->descripcion=$descripcion;
		}
		public function get_id_estudiante(){
			return $this->id_estudiante;
		}
		public function set_id_estudiante($id_estudiante){
			$this->id_estudiante=$id_estudiante;
		}

	}

?>
