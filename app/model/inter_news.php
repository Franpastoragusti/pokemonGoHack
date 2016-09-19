<?php
interface Inter_news {
	public function getNewsByCategory($category);
	public function getNews($id);
	public function getAllNews();
	public function getTheCategoriesOfANews($idNews);
	public function getTwoNewsByCategory($category, $idActualNews);
}
?>