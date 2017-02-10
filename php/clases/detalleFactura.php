<?php
	class DetalleFactura{
		private $id_factura;
		private	$id_curso;
		private $numero_cupos;
		
		public function __construct($id_factura=null,$id_curso=null,$numero_cupos=null){
			if($id_factura!==null){
				$this->id_factura=$id_factura;
			}
			if($id_curso!==null){
				$this->id_curso=$id_curso;
			}
			if($numero_cupos!==null){
				$this->numero_cupos=$numero_cupos;
			}
			
		}
		
		public function get_id_factura(){
			return $this->id_factura;
		}
		public function set_id_factura($id_factura){
			$this->id_factura=$id_factura;
		}
		public function get_id_curso(){
			return $this->id_curso;
		}
		public function set_id_curso($id_curso){
			$this->id_curso=$id_curso;
		}
		public function get_numero_cupos(){
			return $this->numero_cupos;
		}
		public function set_numero_cupos($numero_cupos){
			$this->numero_cupos=$numero_cupos;
		}
		
	}
	
?>