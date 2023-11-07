<?php
class Usuario
{
	private $pdo;
	private $msg;
    public $nombre;
    public $apellido;  
    public $email;
    public $pass;


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


	public function Registrar(usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO usuario (nombre,apellido,email,pass) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array( 
                    $data->nombre,
                    $data->apellido, 
                    $data->email, 
                    $data->pass
                )
			);
		$this->msg="Su registro se ha guardado exitosamente!&t=text-success";
		} catch (Exception $e) 
		{
			if ($e->$errorInfo[1] == 1062){ // error 1062 es de duplicación de datos 
				$this->msg="Correo electrónico ya está registrado en el sistema&t=text-danger";
			 } else {
			 	$this->msg="Error al guardar los datos&t=text-danger";
			 }
			
			 
		}
		return $this->msg;
	}


}