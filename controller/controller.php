<?php

require_once 'model/usuario.php';


class Controller
{
    private $model;
    private $resp;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }

    public function Index(){

        //Le paso los datos a la vista
        require("view/login.php");

    }

    public function CrearUsuario(){

        require("view/crearUsuario.php");

    }

    public function Guardar(){
        $usuario = new Usuario();
        
        $usuario->nombre = $_REQUEST['nombre'];
        $usuario->apellido = $_REQUEST['apellido'];
        $usuario->email = $_REQUEST['correo'];  
        $usuario->pass = md5($_REQUEST['password1']);    
      
        $this->resp= $this->model->Registrar($usuario);

        header('Location: ?op=crear&msg='.$this->resp);
    }

}
