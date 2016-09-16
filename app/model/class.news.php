<?php
//require_once"inter_news.php";
require_once "class.bbdd.php";
class news
{
	
	public function getNewsByCategory($category);
	public function getNews($id){

		$this->conectar();		
		$query = $this->consulta("SELECT * from noticias n where n.id_noticias=$id");
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0) 
		{		
				while ( $tsArray = $this->fetch_assoc($query) ) 
					$data[] = $tsArray;			
		
				return $data;
		}else
		{	
			return '';
		}	

	}
	public function getAllNews();
}
?>