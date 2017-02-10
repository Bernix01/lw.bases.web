<?php
	class Requisito{
		private $id_requisito;
		private $id_curso;
		private $nombre;
		
		public function __construct($id_requisito=null,$id_curso=null,$nombre=null){
			if($id_requisito!==null){
				$this->id_requisito=$id_requisito;
			}
			if($id_curso!==null){
				$this->id_curso=$id_curso;
			}
			if($nombre!==null){
				$this->nombre=$nombre;
			}
			
		}
		
		public function get_id_requisito(){
			return $this->id_requisito;
		}
		public function set_id_requisito($id_requisito){
			$this->id_requisito=$id_requisito;
		}
		public function get_id_curso(){
			return $this->id_curso;
		}
		public function set_id_curso($id_curso){
			$this->id_curso=$id_curso;
		}
		public function get_nombre(){
			return $this->nombre;
		}
		public function set_nombre($nombre){
			$this->nombre=$nombre;
		}
		
	}
?>