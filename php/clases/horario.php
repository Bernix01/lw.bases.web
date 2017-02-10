<?php
	class Horario{
		private $id_horario;
		private $inicio;
		private $fin;
		
		public function __construct($id_horario=null,$inicio=null,$fin=null){
			if($id_horario!==null){
				$this->id_horario=$id_horario;
			}
			if($inicio!==null){
				$this->inicio=$inicio;
			}
			if($fin!==null){
				$this->fin=$fin;
			}
			
		}
		
		public function get_id_horario(){
			return $this->id_horario;
		}
		public function set_id_horario($id_horario){
			$this->id_horario=$id_horario;
		}
		public function get_inicio(){
			return $this->inicio;
		}
		public function set_inicio($inicio){
			$this->inicio=$inicio;
		}
		public function get_fin(){
			return $this->fin;
		}
		public function set_fin($fin){
			$this->fin=$fin;
		}
		
	}
?>