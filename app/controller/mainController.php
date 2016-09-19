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
		$slider='';
		$pagina=load_template();
		$header = load_page("app/view/modules/mainHeader.php");
		$content = load_page("app/view/modules/noticiasMenu.php");
		for ($i=0; $i < 4; $i++) { 
			$slider=$slider."<li><img class='uk-thumbnail uk-thumbnail-medium' src=".$data[$i]['foto']." alt=''><a href=index.php?news=".$data[$i]["id_noticias"]."><h4>".$data[$i]['titulo']."</h4></a></li>";
		}
		$pageNums=sizeof($data)/2;
		$panelsRow=$this->buildRowOfNews($data, $panels1, $panels2, $panelsRow, $news);
		$content = replace_slider('/\#SLIDER\#/ms', $slider, $content);
		$page = replace_header('/\#HEADER\#/ms', $header, $pagina);
		$content = replace_content('/\#CONTENT\#/ms' ,$panelsRow , $content);
		$page = replace_content('/\#CONTENT\#/ms' ,$content , $page);
		return $page;
	}



	public function viewLittleNewsByCategory($category){
		switch ($category) {
			case "news":
				$idCategory=1;
				break;
			case "fails":
				$idCategory=2;
				break;
			case "tips":
				$idCategory=3;
				break;
			default:
				break;
		}
		$news=new News();
		$data = $news->getNewsByCategory($idCategory);
		$panels1='';
		$panels2='';
		$panelsRow='';
		$slider='';
		$dataActualNews = $news->getAllNews();
		$pagina=load_template();
		

		for ($i=0; $i < 4; $i++) { 
			$slider=$slider."<li><img class='uk-thumbnail uk-thumbnail-medium' src=".$dataActualNews[$i]['foto']." alt=''><a href=index.php?news=".$dataActualNews[$i]["id_noticias"]."><h4>".$dataActualNews[$i]['titulo']."</h4></a></li>";
		}




		$header = load_page("app/view/modules/mainHeader.php");
		$content = load_page("app/view/modules/noticiasMenu.php");
		$panelsRow=$this->buildRowOfNews($data, $panels1, $panels2, $panelsRow, $news);

		$content = replace_slider('/\#SLIDER\#/ms', $slider, $content);
		$content = replace_content('/\#CONTENT\#/ms' ,$panelsRow , $content);
		$page = replace_header('/\#HEADER\#/ms', $header, $pagina);
		$page = replace_content('/\#CONTENT\#/ms' ,$content , $page);
		return $page;

	}

	public function viewBigNews($idNews){
		

		$news=new News();
		$pagina=load_template();
		$header = load_page("app/view/modules/header2.php");
		$content = load_page("app/view/modules/noticia.php");
		$data = $news->getNews($idNews);
		$categorias=$news->getTheCategoriesOfANews($data[0]["id_noticias"]);
		$categoryFinal=$categorias[0][0];
		if (sizeof($categorias) > 1) {
			for ($u=1; $u < sizeof($categorias); $u++) { 
				$categoryFinal=$categoryFinal."/".$categorias[$u][0];
			}
		}
		$content = replace_photo('/\#FOTO\#/ms' ,$data[0]["foto"] , $content);
		$content = replace_title('/\#TITULO\#/ms' ,$data[0]["titulo"] , $content);
		$content = replace_subtitle('/\#SUBTITULO\#/ms' ,$data[0]["subtitulo"] , $content);
		$content = replace_newsContent('/\#CONTENIDO\#/ms' ,$data[0]["contenido"], $content);
		$content = replace_date('/\#FECHA\#/ms' ,$data[0]["fecha"] , $content);
		$content = replace_uri('/\#NEWSID\#/ms' ,$data[0]["id_noticias"] , $content);
		$content = replace_category('/\#CATEGORIAS\#/ms' ,$categoryFinal , $content);
		switch ($categorias[0][0]) {
			case "Novedades":
				$idCategory=1;
				break;
			case "Fails":
				$idCategory=2;
				break;
			case "Tips":
				$idCategory=3;
				break;
		}

		$dataLimited=$news->getTwoNewsByCategory($idCategory);
		
		$panels1='';
		$panels2='';
		$panelsRow='';
		
		$panelsRow=$this->buildRowOfNews($dataLimited, $panels1, $panels2, $panelsRow, $news);

		$content = replace_content('/\#CONTENT\#/ms' ,$panelsRow , $content);
		$page = replace_header('/\#HEADER\#/ms', $header, $pagina);
		$page = replace_content('/\#CONTENT\#/ms' ,$content , $page);
		view_page($page);
	}


	function signInUser($nameUser, $pass){
		$user = new User();	
		$result = $user->signIn($nameUser, $pass);
		return $result;
	}
	function loginUser($nameUser, $pass){
		$user = new User();	
		$result = $user->login($nameUser, $pass);
		return $result;
		
	}
	function buildRowOfNews($data, $panels1, $panels2, $panelsRow, $news){
		for ($i=0; $i < sizeof($data); $i++) { 
			$categorias=$news->getTheCategoriesOfANews($data[$i]["id_noticias"]);
			$categoryFinal=$categorias[0][0];
			if (sizeof($categorias) > 1) {
				for ($u=1; $u < sizeof($categorias); $u++) { 
					$categoryFinal=$categoryFinal."/".$categorias[$u][0];
				}
			}
			$panelsHTML = load_page("app/view/modules/pastillas.php");
			$panelsHTML = replace_photo('/\#FOTO\#/ms' ,$data[$i]["foto"] , $panelsHTML);
			$panelsHTML = replace_title('/\#TITULO\#/ms' ,$data[$i]["titulo"] , $panelsHTML);
			$panelsHTML = replace_subtitle('/\#SUBTITULO\#/ms' ,$data[$i]["subtitulo"] , $panelsHTML);
			$panelsHTML = replace_newsContent('/\#CONTENIDO\#/ms' ,substr($data[$i]["contenido"], 0, 200)."..." , $panelsHTML);
			$panelsHTML = replace_date('/\#FECHA\#/ms' ,$data[$i]["fecha"] , $panelsHTML);
			$panelsHTML = replace_uri('/\#NEWSID\#/ms' ,$data[$i]["id_noticias"] , $panelsHTML);
			$panelsHTML = replace_category('/\#CATEGORIAS\#/ms' ,$categoryFinal , $panelsHTML);
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
		return $panelsRow;
	}
}

?>