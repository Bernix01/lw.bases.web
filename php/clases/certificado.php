<?php
	class Certificado{
		private $id_certificado;
		private $contenido;
		private $id_estudiante;
		private $titulo;


		public function __construct($id_certificado=null,$contenido=null,$id_estudiante=null,$titulo=null){
			if($id_certificado!==null){
				$this->id_certificado=$id_certificado;
			}
			if($contenido!==null){
				$this->contenido=$contenido;
			}
			if($id_estudiante!==null){
				$this->id_estudiante=$id_estudiante;
			}
			if($titulo!==null){
				$this->titulo=$titulo;
			}

		}
		public function get_titulo(){
			return $this->titulo;
		}
		public function set_titulo($titulo){
			$this->titulo=$titulo;
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
		public function get_id_estudiante(){
			return $this->id_estudiante;
		}
		public function set_id_estudiante($id_estudiante){
			$this->id_estudiante=$id_estudiante;
		}

	}
?>
