<?php
require_once"app/controller/mainController.php";
//error_reporting(0);
$mvc= new MainController();

if (isset($_POST['user']) &&  isset($_POST['pass']) && isset($_POST['validatePass'])) {
	$patronMayus='/([A-Z]+)/';
	$pasPatronMayus=preg_match($patronMayus, $_POST['pass']);
	#$pasPatronSymbol=preg_match('/[[:punct:]]/', ' ', $_POST['pass']);
	echo strlen($_POST["pass"]);
	if ($_POST["pass"]===$_POST["pass"] && strlen($_POST["pass"])>=8 && $pasPatronMayus == 1){
		echo "holaaaa";
		$result = $mvc->signInUser($_POST['user'],$_POST["pass"]);
	}else{
		$mvc->viewLittleNews();
	}
	
}elseif (isset($_POST['userRegistered']) &&  isset($_POST['password'])) {
	//Logea a un usuario registrado
	$mvc->loginUser($_POST['userRegistered'],$_POST['password']);

}elseif ($_GET['page'] == "news") {
	//Mostrar a categoria de novedades
	$mvc->viewLittleNews();
}elseif ($_GET['page'] == "tips") {
	//Mostrar categoria de consejos
	$mvc->viewLittleNews();

}elseif ($_GET['page'] == "fails") {
	//Mostrar categoria de caídas
	$mvc->viewLittleNews();
}elseif ($_GET['news'] == "id") {
	//Mostrar una noticia seleccionada por el usuario
	$mvc->viewBigNews();

}else{
	$mvc->viewLittleNews();
}



?>