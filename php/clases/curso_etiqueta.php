<?php
	class Curso_Etiqueta{
		private $id_etiqueta;
		private $id_curso;

		public function __construct($id_etiqueta=null,$id_curso=null){
			if($id_etiqueta!==null){
				$this->id_etiqueta=$id_etiqueta;
			}
			if($id_curso!==null){
				$this->id_curso=$id_curso;
			}

		}

		public function get_id_etiqueta(){
			return $this->id_etiqueta;
		}
		public function set_id_etiqueta($id_etiqueta){
			$this->id_etiqueta=$id_etiqueta;
		}
		public function get_id_curso(){
			return $this->id_curso;
		}
		public function set_id_curso($id_curso){
			$this->id_curso=$id_curso;
		}

	}
?>
