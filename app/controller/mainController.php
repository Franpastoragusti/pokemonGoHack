<?php

require_once"pageGenerator.php";
include"app/model/class.user.php";
include"app/model/class.news.php";

class MainController{


	public function viewLittleNews(){
		$news=new News();
		$data = $news->getAllNews();
		$panels1='';
		$panels2='';
		$panelsRow='';
		$pagina=load_template();
		$header = load_page("app/view/modules/mainHeader.php");
		$content = load_page("app/view/modules/noticiasMenu.php");

		for ($i=0; $i < sizeof($data); $i++) { 
			
			$panelsHTML = load_page("app/view/modules/pastillas.php");
			$panelsHTML = replace_photo('/\#FOTO\#/ms' ,$data[$i]["foto"] , $panelsHTML);
			$panelsHTML = replace_title('/\#TITULO\#/ms' ,$data[$i]["titulo"] , $panelsHTML);
			$panelsHTML = replace_subtitle('/\#SUBTITULO\#/ms' ,$data[$i]["subtitulo"] , $panelsHTML);
			$panelsHTML = replace_newsContent('/\#CONTENIDO\#/ms' ,$data[$i]["contenido"] , $panelsHTML);
			$panelsHTML = replace_date('/\#FECHA\#/ms' ,$data[$i]["fecha"] , $panelsHTML);
			$panelsHTML = replace_uri('/\#NEWSID\#/ms' ,$data[$i]["id_noticias"] , $panelsHTML);
			//$single_news = replace_category('/\#CATEGORIA\#/ms' ,$data[$i]["categoria"] , $panelsHTML);
			if ($i % 2 == 0) {
				$panels1='<div class="uk-flex uk-flex-row">'.$panelsHTML;
			}else{
				$panels2=$panelsHTML.'</div>';
			}
			if ($panels2 != '' && $panels1 != '') {
				$panelsRow=$panelsRow.$panels1.$panels2;
				$panels1='';
				$panels2='';
			}
			if ($panels1 != '' && $panels2 == '' && $i==sizeof($data)-1) {
				$panelsRow=$panelsRow.$panels1.'</div>';
			}
		}
		
		$content = replace_content('/\#CONTENT\#/ms' ,$panelsRow , $content);
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