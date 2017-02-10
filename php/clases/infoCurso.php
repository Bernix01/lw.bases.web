<?php
  class Info_curso{
    private $id_curso;
    private $descripcion;
    private $cupo_min;
    private $cupo_max;
    private $cupos_disponibles;
    private $fecha_inicio;
    private $fecha_fin;

    public function __construct($id=null,$descripcion=null,$cupo_min=null,$cupo_max=null,$cupos_disponibles=null,$fecha_inicio=null,$fecha_fin=null){
      if($id!==null){
        $this->id_curso=$id;
      }
      if($descripcion!==null){
        $this->descripcion=$descripcion;
      }
      if($cupo_min!==null){
        $this->cupo_min=$cupo_min;
      }
      if($cupo_max!==null){
        $this->cupo_max=$cupo_max;
      }
      if($cupos_disponibles!==null){
        $this->cupos_disponibles=$cupos_disponibles;
      }
      if($fecha_inicio!==null){
        $this->fecha_inicio=$fecha_inicio;
      }
      if($fecha_fin!==null){
        $this->fecha_fin=$fecha_fin;
      }
    }
    public function get_id_curso(){
      return $this->id_curso;
    }
    public function set_id_curso($id){
      $this->id_curso=$id;
    }
    public function get_descripcion(){
      return $this->descripcion;
    }
    public function set_descripcion($descripcion){
      $this->descripcion=$descripcion;
    }
    public function get_cupo_min(){
      return $this->cupo_min;
    }
    public function set_cupo_min($cupo_min){
      $this->cupo_min=$cupo_min;
    }
    public function get_cupo_max(){
      return $this->cupo_max;
    }
    public function set_cupo_max($cupo_max){
      $this->cupo_max=$cupo_max;
    }
    public function get_cupos_disponibles(){
      return $this->cupos_disponibles;
    }
    public function set_cupos_disponibles($cupos_disponibles){
      $this->cupos_disponibles=$cupos_disponibles;
    }
    public function get_fecha_inicio(){
      return $this->fecha_inicio;
    }
    public function set_fecha_inicio($fecha_inicio){
      $this->fecha_inicio=$fecha_inicio;
    }
    public function get_fecha_fin(){
      return $this->fecha_fin;
    }
    public function set_fecha_fin($fecha_fin){
      $this->fecha_fin=$fecha_fin;
    }
  }
