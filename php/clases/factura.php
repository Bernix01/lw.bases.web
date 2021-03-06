<?php
	class Factura{
		private $id_factura;
		private $numero_factura;
		private $nombres;
		private $apellidos;
		private $total;
		private $direccion;
		private $fecha;
		private $ruc; //será el mismo ruc del estudiante
		private $cupos;
		private $id_estudiante;


		public function __construct($id_factura=null,$nombres=null,$apellidos=null,$total=null,$direccion=null,$fecha=null,$ruc=null,$id_estudiante=null,$numero_factura=null){
			if($id_factura!==null){
				$this->id_factura=$id_factura;
			}
			if($nombres!==null){
				$this->nombres=$nombres;
			}
			if($apellidos!==null){
				$this->apellidos=$apellidos;
			}
			if($total!==null){
				$this->total=$total;
			}
			if($direccion!==null){
				$this->direccion=$direccion;
			}
			if($fecha!==null){
				$this->fecha=$fecha;
			}
			if($ruc!==null){
				$this->ruc=$ruc;
			}

			if($id_estudiante!==null){
				$this->id_estudiante=$id_estudiante;
			}
			if($numero_factura!==null){
				$this->numero_factura=$numero_factura;
			}

		}

		public function get_id_factura(){
			return $this->id_factura;
		}
		public function set_id_factura($id_factura){
			$this->id_factura=$id_factura;
		}
		public function get_nombres(){
			return $this->nombres;
		}
		public function set_nombres($nombres){
			$this->nombres=$nombres;
		}
		public function get_apellidos(){
			return $this->apellidos;
		}
		public function set_apellidos($apellidos){
			$this->apellidos=$apellidos;
		}
		public function get_total(){
			return $this->total;
		}
		public function set_total($total){
			$this->total=$total;
		}
		public function get_direccion(){
			return $this->direccion;
		}
		public function set_direccion($direccion){
			$this->direccion=$direccion;
		}
		public function get_fecha(){
			return $this->fecha;
		}
		public function set_fecha($fecha){
			$this->fecha=$fecha;
		}
		public function get_ruc(){
			return $this->ruc;
		}
		public function set_ruc($ruc){
			$this->ruc=$ruc;
		}

		public function get_id_estudiante(){
			return $this->id_estudiante;
		}
		public function set_id_estudiante($id_estudiante){
			$this->id_estudiante=$id_estudiante;
		}
		public function get_numero_factura(){
			return $this->numero_factura;
		}
		public function set_numero_factura($num){
			$this->numero_factura=$num;
		}
		public function get_cupos(){
			return $this->cupos;
		}
		public function set_cupos($num){
			$this->cupos=$num;
		}


	}

?>
