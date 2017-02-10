<?php
	class InfoRequisito{
		private $id_requisito;
		private $url_imagen;
		private $descripcion;
		
		public function __construct($id_requisito=null,$url_imagen=null,$descripcion=null){
			if($id_requisito!==null){
				$this->id_requisito=$id_requisito;
			}
			if($url_imagen!==null){
				$this->url_imagen=$url_imagen;
			}
			if($descripcion!==null){
				$this->descripcion=$descripcion;
			}
			
		}
		
		public function get_id_requisito(){
			return $this->id_requisito;
		}
		public function set_id_requisito($id_requisito){
			$this->id_requisito=$id_requisito;
		}
		public function get_url_imagen(){
			return $this->url_imagen;
		}
		public function set_url_imagen($url_imagen){
			$this->url_imagen=$url_imagen;
		}
		public function get_descripcion(){
			return $this->descripcion;
		}
		public function set_descripcion($descripcion){
			$this->descripcion=$descripcion;
		}
		
	}
?>