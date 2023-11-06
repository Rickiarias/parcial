<?php
require_once 'model/conexion.php';
class Usuario
{
private $pdo;
private $msg;
public $nombre;
public $email;
public $contrasena;

public function __CONSTRUCT()
{
    try
    {
        $this->pdo = Db::StartUp();     
    }
    catch(Exception $e)
    {
        die($e->getMessage());
    }
}
public function registrar(usuario $data)
{
    try 
    {
    $sql = "INSERT INTO usuario (nombre,email,contrasena) 
    VALUES (?, ?, ?)";
    $this->pdo->prepare($sql)
    ->execute(
        array(
            $data->nombre,
            $data->email,
            $data->contrasena
        )
    );
    $this->msg="se guardo exitosamente";
    } catch (Exception $e) 
    {
        die($e->getMessage());
    }
}
}