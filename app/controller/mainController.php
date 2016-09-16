<?php

require_once"pageGenerator.php";
include"app/model/class.user.php";
include"app/model/class.news.php";

class MainController{


	public function viewLittleNews(){
		$news=new News();
		$data = $news->getAllNews();
		$rows = sizeof($data)/2;

		echo $data[0]["titulo"];

		$rows = sizeof($data)/2;
		$panels = "";
		$pagina=load_template();
		$header = load_page("app/view/modules/mainHeader.php");
		

		for ($i=0; $i < $rows; $i++) { 
			$rep=replace_data('/\#DATA\#/ms' ,$data , $)

			$panelsHTML = load_page("app/view/modules/pastillas.php");


			$panels=$panels.$panelsHTML;
		}
		$content = load_page("app/view/modules/noticiasMenu.php");
		$content = replace_content('/\#CONTENT\#/ms' ,$panels , $content);
		$page = replace_header('/\#HEADER\#/ms', $header, $pagina);
		$page = replace_content('/\#CONTENT\#/ms' ,$content , $page);
		view_page($page);
	}

	public function viewBigNews(){
		$pagina=load_template();
		$header = load_page("app/view/modules/header2.php");
		$content = load_page("app/view/modules/noticia.php");
		$page = replace_header('/\#HEADER\#/ms', $header, $pagina);
		$page = replace_content('/\#CONTENT\#/ms' ,$content , $page);
		view_page($page);
	}


	function signInUser($nameUser, $pass){
		$user = new User();	
		$result = $user->signIn($nameUser, $pass);
		if ($result) {
			$pagina=load_template();
			$header = load_page("app/view/modules/mainHeader.php");
			$header = preg_replace('/LOGIN/', strtoupper($nameUser), $header);
			$header = preg_replace('/\#modalLogin/', "", $header);
			$content = load_page("app/view/modules/noticiasMenu.php");
			$page = replace_header('/\#HEADER\#/ms', $header, $pagina);
			$page = replace_content('/\#CONTENT\#/ms' ,$content , $page);
			view_page($page);
		}
	}
	function loginUser($nameUser, $pass){
		$user = new User();	
		$result = $user->login($nameUser, $pass);
		$id=$result[0]['id_user'];
		if($result!=''){
			$pagina=load_template();
			$header = load_page("app/view/modules/mainHeader.php");
			$header = preg_replace('/LOGIN/', strtoupper($nameUser), $header);
			$header = preg_replace('/\#modalLogin/', "", $header);
			$content = load_page("app/view/modules/noticiasMenu.php");
			$page = replace_header('/\#HEADER\#/ms', $header, $pagina);
			$page = replace_content('/\#CONTENT\#/ms' ,$content , $page);
			view_page($page);
		}
	}
}

?>