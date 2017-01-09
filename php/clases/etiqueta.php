<?php
<<<<<<< HEAD
	class Etiqueta{
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
=======
  /**
   *
   */
  class Etiqueta
  {
    private $id_etiqueta;
    private $nombre;

    function __construct($id_etiqueta=null,$nombre=null)
    {
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
    public function set_id_etiqueta($id){
      $this->id_etiqueta=$id;
    }
    public function get_nombre(){
      return $this->nombre;
    }
    public function set_nombre($nombre){
      $this->nombre=$nombre;
    }
  }

 ?>
>>>>>>> origin/master
