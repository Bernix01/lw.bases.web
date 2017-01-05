<?php

  class Info_usuario{
    private $id_usuario;
    private $nombres;
    private $apellidos;
    private $numero_cursos;
    private $tag_line;



    public function __construct($id_usuario=null,$nombres=null,$apellidos=null,$numero_cursos=null,$tag_line=null){
      if($id_usuario!==null){
        $this->id_usuario=$id_usuario;
      }
      if($nombres!==null){
        $this->nombres=$nombres;
      }
      if($apellidos!==null){
        $this->apellidos=$apellidos;
      }
      if($numero_cursos!==null){
        $this->numero_cursos=$numero_cursos;
      }
      if($tag_line!==null){
        $this->tag_line=$tag_line;
      }

    }


    public function get_id_usuario(){
      return $this->id_usuario;
    }
    public function set_id_usuario($id){
      $this->id_usuario=$id;
    }
    public function set_nombres($nombres){
      $this->nombres=$nombres;
    }
    public function get_nombres(){
      return $this->nombres;
    }
    public function set_apellidos($apellidos){
      $this->apellidos=$apellidos;
    }
    public function get_apellidos(){
      return $this->apellidos;
    }
    public function set_numero_cursos($numero_cursos){
      $this->numero_cursos=$numero_cursos;
    }
    public function get_numero_cursos(){
      return $this->numero_cursos;
    }
    public function set_tag_line($tag_line){
      $this->tag_line=$tag_line;
    }
    public function get_tag_line(){
      return $this->tag_line;
    }


  }
