<?php
require_once"inter_user.php";
require_once "class.bbdd.php";

class User implements  Inter_user
{
	
	function signIn($nameUser, $pass){
		$db=new Database;
		$db->conectar();	
		$encryptKey=md5($pass);
		$sentencia = "INSERT INTO usuarios(nombre, password) VALUES ('$nameUser', '$encryptKey')";	
		$query = $db->consulta($sentencia);
		if($query==true){
			$db->disconnect();	
			return true;
		}else{
			$db->disconnect();	
			return false;
		}


	}
	function login($nameUser, $pass){
		$db=new Database;
		$db->conectar();	
		$encryptKey=md5($pass);
		$sentencia = "SELECT u.id FROM usuarios u WHERE u.nombre='$nameUser' AND u.password='$encryptKey'";	
		$query = $db->consulta($sentencia);

		if($db->numero_de_filas($query) > 0)
		{		
				while ( $tsArray = $db->fetch_assoc($query) ) 
					$data[] = $tsArray;			
		
				return $data;
		}else
		{	
			return '';
		}		


	}
}
?>