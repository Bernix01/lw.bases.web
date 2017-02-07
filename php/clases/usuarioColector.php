<?php
include_once('colector.php');
include_once ("usuario.php");
class usuarioColector
{
    private $worker = NULL;

    public function __construct()
    {
        $this->worker = new Colector();
    }

    public function getAll(){
        return $this->worker->read("usuario",Usuario::class);
    }

    public function getUserByCredentials($nickname, $contrasenia)
    {
        $query = "SELECT * FROM usuario WHERE nickname='" . $nickname . "'AND contrasenia='" . $contrasenia . "'";
        $result = $this->worker->execQueryReturning($query,Usuario::class);
        //if ($result !== NULL) {
            //$data = mysqli_fetch_assoc($result); //count(array)(?)
            //$usuario = new Usuario();
          //  $usuario->set_id_usuario($data['id_usuario']);
          //  $usuario->set_nickname($data['nickname']);
          //  $usuario->set_contrasenia($data['contrasenia']);
          //  $usuario->set_email($data['email']);
          //  $usuario->set_last_login($data['last_login']);
          //  $usuario->set_rol($data['rol']);
            return $result;
        //}
        //return NULL;
    }

    public function deleteUsuario($id_usuario)
    {
        $query = 'call borrar_usuario(?)';
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function updateUsuario($id, $nickname, $contrasenia, $email, $rol)
    {
        $query = "UPDATE usuario SET nickname=\"$nickname\", contrasenia=\"$contrasenia\", rol=$rol, email=\"$email\" WHERE id_usuario=\"$id\"";
        echo $query;
        $result = $this->worker->execQuery($query);
        return $result;
    }

    public function addUsuario($id, $nickname, $contrasenia, $email, $rol)
    {
        $query = "INSERT into usuario(id_usuario,nickname, contrasenia, email, rol) values(\"$id\",\"$nickname\", \"$contrasenia\", \"$email\", $rol)";
        $result = $this->worker->execQuery($query);
        echo $query;
        if ($result ) {
            $usuario = $this->getUserById($id);
            return $usuario->get_nickname() == $nickname ? $usuario : null;
        }
        return null;
    }

    public function getUserById($id)
    {
        $query = "call getUserById($id)";
        $result = $this->worker->execQueryReturning($query, Usuario::class);
        return $result;
    }

    public function realizarPagoDeposito($id_estudiante,$nombres,$apellidos,$total,$direccion,$id_curso){

      $this->worker->beginTransaction();
      $result=$this->worker->execQuery("call realizarPagoDeposito($nombres,$apellidos,$total,$direccion,$id_estudiante,null,$id_curso)");
      $this->worker->commit();
      $result= $result->fetchObject(Factura::class);
      return $result;
    }


}
