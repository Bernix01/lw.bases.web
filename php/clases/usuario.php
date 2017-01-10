<?php

class Usuario
{
    private $id_usuario;
    private $nickname;
    private $contrasenia;
    private $email;
    private $last_login;
    private $rol;

    /**
     * Usuario constructor.
     * @param $id_usuarioo
     * @param $nicknamee
     * @param $contraseniaa
     * @param $emaill
     * @param $lastt_loginn
     * @param $roll
     */
    public function __construct($id_usuarioo=null, $nicknamee=null, $contraseniaa=null, $emaill=null, $lastt_loginn=null, $roll= 0)
    {
        $this->id_usuario = $id_usuarioo;
        $this->nickname = $nicknamee;
        $this->contrasenia = $contraseniaa;
        $this->email = $emaill;
        $this->last_login = $lastt_loginn;
        $this->rol = $roll;
    }


    public function get_id_usuario()
    {
        return $this->id_usuario;
    }

    public function set_id_usuario($id)
    {
        $this->id_usuario = $id;
    }

    public function set_nickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function get_nickname()
    {
        return $this->nickname;
    }

    public function set_contrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }

    public function get_contrasenia()
    {
        return $this->contrasenia;
    }

    public function set_email($email)
    {
        $this->email = $email;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function set_last_login($lastLogin)
    {
        $this->last_login = $lastLogin;
    }

    public function get_last_login()
    {
        return $this->last_login;
    }

    public function set_rol($rol)
    {
        $this->rol = $rol;
    }

    public function get_rol()
    {
        return $this->rol;
    }


}