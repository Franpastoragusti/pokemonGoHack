<?php
require_once"app/controller/mainController.php";
//error_reporting(0);
$mvc= new MainController();

if (isset($_POST['user']) &&  isset($_POST['pass']) && isset($_POST['validatePass'])) {
	$patronMayus='/([A-Z]+)/';
	$pasPatronMayus=preg_match($patronMayus, $_POST['pass']);
	$pasPatronSymbol=preg_match('/[[:punct:]]/', ' ', $_POST['pass']);
	echo $pasPatronSymbol;
	echo $pasPatronMayus;
	echo strlen($_POST["pass"]);
	if ($_POST["pass"]===$_POST["pass"] && strlen($_POST["pass"])>=8 && $pasPatronMayus == 1 && $pasPatronSymbol>1){
		echo "holaaaa";
		$result = $mvc->signInUser($_POST['user'],$_POST["pass"]);
	}else{
		$mvc->viewLittleNews();
	}
	
}elseif (isset($_POST['userRegistered']) &&  isset($_POST['password'])) {
	//Logea a un usuario registrado
	$mvc->loginUser($_POST['userRegistered'],$_POST['password']);

}elseif (isset($_GET['page'])) {
	//Mostrar categoria de consejos
	$mvc->viewLittleNewsByCategory($_GET['page']);

}elseif (isset($_GET['news'])) {
	//Mostrar una noticia seleccionada por el usuario
	//$mvc->viewBigNews($_GET['news']);

}else{
	$mvc->viewLittleNews();
}



?>