<?php
  class Curso{
    private $id_curso;
    private $nombre;
    private $costo;

    public function __construct($id=null,$nombre=null,$costo=null){
      if($id!==null){
        $this->id_curso=$id;
      }
      if($nombre!==null){
        $this->nombre=$nombre;
      }
      if($costo!==null){
        $this->costo=$costo;
      }

    }

    public function get_id_curso(){
      return $this->id_curso;
    }
    public function set_id_curso($id){
      $this->id_curso=$id;
    }
    public function get_nombre(){
      return $this->nombre;
    }
    public function set_nombre($nombre){
      $this->nombre=$nombre;
    }
    public function get_costo(){
      return $this->costo;
    }
    public function set_costo($costo){
      $this->costo=$costo;
    }

  }

?>
