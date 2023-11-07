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

	public function Login($email, $pass) {
		try {
			$stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND contrasena = :pass");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
	
			if ($user) {
				// Usuario y contraseña coinciden.
				// Puedes almacenar información del usuario en la sesión si es necesario.
				$_SESSION['id'] = $user['id'];
				return true;
			} else {
				$this->msg = "Usuario o contraseña incorrectos.";
				return false;
			}
		} catch (Exception $e) {
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