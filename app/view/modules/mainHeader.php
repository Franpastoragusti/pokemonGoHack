<!DOCTYPE html>
<html> 

	<head>

		<title> POKEMON GO MAGAZINE</title>

		

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.1/css/uikit.min.css">

		<link rel="stylesheet" type="text/css" href="../css/pokemonCSS.css">
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.1/js/uikit.min.js"></script>

	</head>
	
	<body>


		<nav class="uk-navbar">

				<div  class="uk-navbar-nav">

        			<ul class="uk-navbar-nav">
  					
  					<li class="logo"> <img src="../img/pokeball.png" id="logo" class="uk-animation-shake"> </li>

  					</ul>

  			</div>
    	

        	<div  class="uk-navbar-flip">

        			<ul class="uk-navbar-nav ">
  					
  					<li class="uk-button-danger"> <a href="#modalLogin" data-uk-modal>LOGIN</a></li>

  					</ul>

  			</div>

		</nav>

		<nav class="uk-navbar">

		<ul class="uk-navbar-nav uk-navbar-center">

    				
  					<li> <a href="#Noticias" > NOTICIAS </a> </li>
  					<li> <a href="#news"> TIPS </a> </li>
  					<li> <a href="#modalRegister" data-uk-modal> FAIL </a> </li>

        	</ul>

        </nav>



<div id="modalLogin" class="uk-modal">
	<div id="mainLog" class="uk-form-file uk-width-medium-1-1 uk-container-center uk-text-center
		uk-modal-dialog uk-modal-dialog-lightbox">
		<div class="uk-modal-dialog">
        	<a class="uk-modal-close uk-close uk-close-alt"></a>
		        <form id="logg" class="uk-panel uk-form uk-border-rounded uk-cover-background" action='index.php' method='post'>

		            <div class="uk-form-row">
		                <label for="user"></label>
		                    <input class="uk-width-1-3 uk-form-large" type="text" name='user' id='user' placeholder="Introduce tu usuario">
		            </div>
		            <div class="uk-form-row">
		                <label for="password"></label>
		                    <input class="uk-width-1-3 uk-form-large" type="text" name='contraseña' id='contraseña' placeholder="Introduce tu contraseña">
		            </div>
		            <div class="uk-form-row">
		                <input type='submit' value='Entra' class="uk-width-1-6 uk-button uk-button-danger uk-button-large"/>
		            </div>
		        </form>
		</div>
	</div>
</div>

<div id="modalRegister" class="uk-modal">

	<div id="mainRegister" class="uk-form-file uk-width-medium-1-1 uk-container-center uk-text-center uk-height-viewport">
		<div class="uk-modal-dialog">
        	<a class="uk-modal-close uk-close uk-close-alt"></a>
	        <form id="register" class=" uk-panel uk-form uk-cover-background uk-border-rounded" action='index.php' method='post'>

	            <div class="uk-form-row">
	                <label for="user"></label>
	                    <input class="uk-width-1-2 uk-form-large" type="text" name='user' id='user' placeholder="Introduce tu usuario">
	            </div>
	            <div class="uk-form-row">
	                <label for="pass"></label>
	                    <input class="uk-width-1-2 uk-form-large" type="text" name='pass' id='pass' placeholder="Introduce tu contraseña">
	            </div>
	            <div class="uk-form-row">
	                <label for="validatePass"></label>
	                    <input class="uk-width-1-2 uk-form-large" type="text" name='validatePass' id='validatePass' placeholder="Confirma tu contraseña">
	            </div>
	               
	            <div class="uk-form-row">
	                <input type='submit' value='Entra' class="uk-width-1-6 uk-button uk-button-danger uk-button-large"/>
	            </div>
	            
	        </form>
		</div>
	</div>
</div>

<!--

		<div id="slider">
			
			<figure>

			<img src="1.jpg" class="Foto">
			<img src="2.jpg" class="Foto">
			<img src="3.jpg" class="Foto">
			<img src="4.jpg" class="Foto">
			<img src="5.jpg" class="Foto">
			
			</figure>
</div>
-->
	</body>
</html>