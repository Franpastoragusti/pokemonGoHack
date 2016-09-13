<?php
class Database {
 protected $conexion;
  
 
     
  public function conectar()
	{	
		include("mysqli.inc.php");
		if(!isset($this->conexion))
		{
			
		  $this->conexion = mysqli_connect($mysql_server,$mysql_login,$mysql_pass,$mysql_db,3306) or die(mysqli_error());
		  //para conectar con RDS el Usuario es admin y la pass 1234ABCD
		  mysqli_set_charset($this->conexion, "utf8");
		}	
	}
	
 
	public function consulta($sql)
	{
		$resultado = mysqli_query($this->conexion,$sql);
					
		return $resultado; 
	}

	function numero_de_filas($result){
		
		return mysqli_num_rows($result);
	}
	

	function fetch_assoc($result){
		
			return mysqli_fetch_assoc($result);
	}
	
	public function disconnect()
	{
		mysqli_close($this->conexion);
	}
	
}
?>