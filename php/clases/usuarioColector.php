<?php
include_once('colector.php');
include_once('usuario.php');

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

    public function getUserById($id)
    {
        $query = "SELECT * FROM usuario WHERE id_usuario=\"" . $id . "\" LIMIT 1";
        $result = $this->worker->execQueryReturning($query,Usuario::class);
        return $result;
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
        $query = "DELETE FROM usuario WHERE usuario.id_usuario=$id_usuario";
        $result = $this->worker->query($query);
        if ($result !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUsuario($id, $nickname, $contrasenia, $email, $rol)
    {
        $query = "UPDATE usuario SET nickname=$nickname, contrasenia=$contrasenia, rol=$rol, email=$email WHERE id_usuario=\"$id\"";
        $result = $this->worker->query($query);
        return $result !== null;
    }

    public function addUsuario($id, $nickname, $contrasenia, $email, $rol)
    {
        $query = "INSERT into usuario(id_usuario,nickname, contrasenia, email, rol) values(\"$id\",\"$nickname\", \"$contrasenia\", \"$email\", $rol)";
        $result = $this->worker->execQuery($query);
        echo $query;
        if ($result !== null) {
            $usuario = $this->getUserById($id);
            var_dump($usuario);
            return $usuario->get_nickname() == $nickname ? $usuario : null;
        }
        return null;
    }

}

?>
