<?php
require_once 'models/usuario.php';

class usuarioController
{
    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            //Validacion
            $errores = array();
            if (empty($nombre) && is_numeric($nombre) && preg_match("/[0-9]/", $nombre)) {
                $errores['nombre'] = "El nombre es invalido";
            }
            if (empty($apellidos) && is_numeric($apellidos) && preg_match("/[0-9]/", $apellidos)) {
                $errores['apellidos'] = "El apellido es invalido";
            }
            if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = "El email es invalido";
            }
            if (empty($password)) {
                $errores['password'] = "El contraseña esta vacia";
            }

            if (count($errores) == 0) {
                $usuario = new Usuario();
                $usuario->setNombre($_POST['nombre']);
                $usuario->setApellido($_POST['apellidos']);
                $usuario->setEmail($_POST['email']);
                $usuario->setPassword($_POST['password']);
                $save = $usuario->save();
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
            header("Location:" . base_url . 'usuario/registro');
        }
    }

    public function login()
    {
        if (isset($_POST)) {

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SERVER['error_login'] = 'identificacion fallida';
            }
        }
        header("Location:" . base_url);
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            session_destroy();
        }
        header("Location:" . base_url);
    }
}
