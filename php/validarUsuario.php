<?php 
require_once("../clases/AccesoDatos.php");
require_once("../clases/usuario.php");

session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];
$nombre=$_POST['nombre'];

$retorno;

$var = usuario::TraerUnUsuario($usuario);

	if($var==NUll)
	{
		$var = new usuario();
		$var->correo = $usuario;
		$var->nombre = $nombre;
		$var->clave = $clave;

		$var->InsertarUsuario();
		$retorno="Registrado";
	}
	else
	{
				if($var->correo== $usuario && $var->clave==$clave && $nombre == NULL)
				{			
					if($recordar=="true")
					{
						setcookie("correo",$usuario,  time()+36000 , '/');
						setcookie("clave",$clave,  time()+36000 , '/');
		
					}
					else{	
							setcookie("correo",$usuario,  time()-36000 , '/');
							setcookie("clave",$clave,  time()-36000 , '/');
		
					}
					$_SESSION['registrado']=$usuario;
					$retorno=" ingreso";
			   }
			   else{
						if($var->correo== $usuario && $var->clave==$clave && $nombre != NULL)
						{
							$var->correo = $usuario;
							$var->nombre = $nombre;


							$var->ModificarUsuario();
							$retorno="Modificado";
						}
			   }
			   //
			   $retorno ="No-esta";	
	}




echo $retorno;
?>