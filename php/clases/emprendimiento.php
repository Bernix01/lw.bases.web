<?php
	class Emprendimiento{
		private $id_emprendimiento;
		private $nombre_emp;
		private $descripcion_emp;
		private $id_usuario;
		
		public function __construct($id_emprendimiento=null,$nombre_emp=null,$descripcion_emp=null,$id_usuario=null){
			if($id_emprendimiento!==null){
				$this->id_emprendimiento=$id_emprendimiento;
			}
			if($nombre_emp!==null){
				$this->nombre_emp=$nombre_emp;
			}
			if($descripcion_emp!==null){
				$this->descripcion_emp=$descripcion_emp;
			}
			if($id_usuario!==null){
				$this->id_usuario=$id_usuario;
			}
		}
		
		public function get_id_emprendimiento(){
			return $this->id_emprendimiento;
		}
		public function set_id_emprendimiento($id_emprendimiento){
			$this->id_emprendimiento=$id_emprendimiento;
		}
		public function get_nombre_emp(){
			return $this->nombre_emp;
		}
		public function set_nombre_emp($nombre_emp){
			$this->nombre_emp=$nombre_emp;
		}
		public function get_descripcion_emp(){
			return $this->descripcion_emp;
		}
		public function set_descripcion_emp($descripcion_emp){
			$this->descripcion_emp=$descripcion_emp;
		}
		public function get_id_usuario(){
			return $this->id_usuario;
		}
		public function set_id_usuario($id_usuario){
			$this->id_usuario=$id_usuario;
		}
		
	}
	
?>