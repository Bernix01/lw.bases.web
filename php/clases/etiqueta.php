<?php
	class Etiqueta{
		private $id_etiqueta;
		private $nombre;

		public function __construct($id_etiqueta=null,$nombre=null){
			if($id_etiqueta!==null){
				$this->id_etiqueta=$id_etiqueta;
			}
			if($nombre!==null){
				$this->nombre=$nombre;
			}

		}

		public function get_id_etiqueta(){
			return $this->id_etiqueta;
		}
		public function set_id_etiqueta($id_etiqueta){
			$this->id_etiqueta=$id_etiqueta;
		}
		public function get_nombre(){
			return $this->nombre;
		}
		public function set_nombre($nombre){
			$this->nombre=$nombre;
		}

	}
?>
