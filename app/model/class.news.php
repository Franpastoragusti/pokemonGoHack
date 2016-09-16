<?php
//require_once"inter_news.php";
require_once "class.bbdd.php";
class News
{
	
	public function getNewsByCategory($category){
		$db=new Database;
		$db->conectar();		
		$query = $db->consulta('SELECT n.* FROM noticias n, pertenecen p WHERE n.id_noticias=p.id_noticia AND n.id_noticias=$id');
 	    $db->disconnect();					
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


	public function getNews($id){
		$db=new Database;
		$db->conectar();		
		$query = $db->consulta("SELECT * from noticias n where n.id_noticias=$id");
 	    $db->disconnect();					
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
	public function getAllNews(){
		$db=new Database;
		$db->conectar();		
		$query = $db->consulta("SELECT * FROM noticias");
 	    $db->disconnect();					
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