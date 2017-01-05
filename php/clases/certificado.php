<?php
	class Certificado{
		private $id_certificado;
		private $contenido;
		private $id_usuario;
		
		
		public function __construct($id_certificado=null,$contenido=null,$id_usuario=null){
			if($id_certificado!==null){
				$this->id_certificado=$id_certificado;
			}
			if($contenido!==null){
				$this->contenido=$contenido;
			}
			if($id_usuario!==null){
				$this->id_usuario=$id_usuario;
			}
			
		}
		
		public function get_id_certificado(){
			return $this->id_certificado;
		}
		public function set_id_certificado($id_certificado){
			$this->id_certificado=$id_certificado;
		}
		public function get_contenido(){
			return $this->contenido;
		}
		public function set_contenido($contenido){
			$this->contenido=$contenido;
		}
		public function get_id_usuario(){
			return $this->id_usuario;
		}
		public function set_id_usuario($id_usuario){
			$this->id_usuario=$id_usuario;
		}
		
	}
?>