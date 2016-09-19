<?php
require_once"app/controller/mainController.php";
error_reporting(0);
$mvc= new MainController();
	
	session_start();


if (isset($_POST['user']) &&  isset($_POST['pass']) && isset($_POST['validatePass'])) {
	$patronMayus='/([A-Z]+)/';
	$patronSymbol='/([^[a-z]+)/';
	$pasPatronMayus=preg_match($patronMayus, $_POST['pass']);
	$pasPatronSymbol=preg_match($patronSymbol, $_POST['pass']);

	if ($_POST["pass"]===$_POST["validatePass"] && strlen($_POST["pass"])>=8 && $pasPatronMayus == 1 && $pasPatronSymbol == 1){
		$result = $mvc->signInUser($_POST['user'],$_POST["pass"]);
		$page=$mvc->viewLittleNews();
		if ($result) {
			$_SESSION["user"]=$_POST['user'];
			$mvc->imARegisteredUser($_SESSION['user'], $page);
		}else{
		echo "<div class='uk-panel uk-panel-box-warning'><div class='uk-panel-badge uk-badge uk-badge-danger'><a href='index.php'>Close</a></div><h3 class='uk-panel-title'>Unespected Error</h3><p>The password or user is not correct</p></div>";		
		$page=$mvc->viewLittleNews();
		echo $page;
		}
	}else{	
		$page=$mvc->viewLittleNews();
		echo "<div class='uk-panel uk-panel-box-warning'><div class='uk-panel-badge uk-badge uk-badge-danger'><a href='index.php'>Close</a></div><h3 class='uk-panel-title'>Unespected Error</h3><p>The password or user is not correct</p></div>";
		echo $page;
	}
}elseif (isset($_POST['userRegistered']) &&  isset($_POST['password'])) {
	//Logea a un usuario registrado
	$result= $mvc->loginUser($_POST['userRegistered'],$_POST['password']);
	$page=$mvc->viewLittleNews();
		if ($result) {
			$_SESSION["user"]=$_POST['userRegistered'];
			$mvc->imARegisteredUser($_SESSION['user'], $page);
		}else{
			echo "<div class='uk-panel uk-panel-box-warning'><div class='uk-panel-badge uk-badge uk-badge-danger'><a href='index.php'>Close</a></div><h3 class='uk-panel-title'>Unespected Error</h3><p>The password or user is not correct</p></div>";		
			$page=$mvc->viewLittleNews();
			echo $page;
		}

}elseif (isset($_GET['secction'])) {
	//Mostrar categoria de consejos
	$page=$mvc->viewLittleNewsByCategory($_GET['secction']);

	if ($_SESSION["user"]) {
			$mvc->imARegisteredUser($_SESSION['user'], $page);
	}else{
		echo $page;
	}
}elseif (isset($_GET['news'])) {
	//Mostrar una noticia seleccionada por el usuario
	$page=$mvc->viewBigNews($_GET['news']);
	if ($_SESSION["user"]) {
			$mvc->imARegisteredUser($_SESSION['user'], $page);
	}else{
		echo $page;
	}
}elseif (isset($_GET['logout'])) {
	session_destroy();
	$page=$mvc->viewLittleNews();
	echo $page;

}else{

	$page=$mvc->viewLittleNews();
	if ($_SESSION["user"]) {
			$mvc->imARegisteredUser($_SESSION['user'], $page);
	}else{
		echo $page;
	}
}


?>