<?php
require_once"app/controller/mainController.php";
//error_reporting(0);
$mvc= new MainController();
	
	session_start();


if (isset($_POST['user']) &&  isset($_POST['pass']) && isset($_POST['validatePass'])) {
	$patronMayus='/([A-Z]+)/';
	$pasPatronMayus=preg_match($patronMayus, $_POST['pass']);
	#$pasPatronSymbol=preg_match('/[[:punct:]]/', ' ', $_POST['pass']);
	echo strlen($_POST["pass"]);
	if ($_POST["pass"]===$_POST["pass"] && strlen($_POST["pass"])>=8 && $pasPatronMayus == 1){
		echo "holaaaa";
		$result = $mvc->signInUser($_POST['user'],$_POST["pass"]);
		$page=$mvc->viewLittleNews();
		if ($result) {
			$_SESSION["user"]=$_POST['user'];
			$page = preg_replace('/LOGIN/', strtoupper($_SESSION["user"]), $page);
			$page = preg_replace('/\#modalLogin/', "", $page);
			echo $page;
		}
	}
}elseif (isset($_POST['userRegistered']) &&  isset($_POST['password'])) {
	//Logea a un usuario registrado
	$result= $mvc->loginUser($_POST['userRegistered'],$_POST['password']);
	if ($result) {
		$_SESSION["user"]=$_POST['userRegistered'];
	}
	$page=$mvc->viewLittleNews();
		if ($result) {
			$page = preg_replace('/LOGIN/', strtoupper($_SESSION["user"]), $page);
			$page = preg_replace('/\#modalLogin/', "", $page);
			echo $page;
		}

}elseif (isset($_GET['page'])) {
	//Mostrar categoria de consejos
	$page=$mvc->viewLittleNewsByCategory($_GET['page']);

	if ($_SESSION["user"]) {
			$page = preg_replace('/LOGIN/', strtoupper($_SESSION["user"]), $page);
			$page = preg_replace('/\#modalLogin/', "", $page);
			echo $page;
	}else{
		echo $page;
	}
}elseif (isset($_GET['news'])) {
	//Mostrar una noticia seleccionada por el usuario
	//$mvc->viewBigNews($_GET['news']);




}elseif (isset($_GET['logout'])) {
	session_destroy();
	$page=$mvc->viewLittleNews();
	echo $page;

}else{

	$page=$mvc->viewLittleNews();
	if ($_SESSION["user"]) {
			$page = preg_replace('/LOGIN/', strtoupper($_SESSION["user"]), $page);
			$page = preg_replace('/\#modalLogin/', "", $page);
			echo $page;
	}else{
		echo $page;
	}
}

echo $_SESSION["user"];


?>