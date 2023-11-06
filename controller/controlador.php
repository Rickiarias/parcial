<?php
require_once'model/usuario.php';

class control{
    private $model;
    private $resp;

    public function __CONSTRUCT(){
        $this->model = new usuario();
    }
    public function index(){
        require_once'view/header.php';
        require_once'view/usuario/usuario.php';
        require_once'view/footer.php';
    }
    public function crearUs(){
        require("usuario.php");
    }
    public function guardarUs(){
        $alm = new usuario();
        $alm->nombre = $_REQUEST['nombre'];
        $alm->email = $_REQUEST['email'];
        $alm->contrasena = $_REQUEST['contrasena'];
        $this->resp=$this->model->registrar($alm);
        header('Location: index.php'.$this->resp);
    }
}