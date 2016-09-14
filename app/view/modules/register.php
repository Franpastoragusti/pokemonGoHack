<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.1/css/uikit.min.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
	<div id="main" class="uk-form-file uk-cover-background uk-width-medium-1-1 uk-container-center uk-text-center uk-height-viewport">
        <form id="register" class=" uk-panel uk-form uk-cover-background uk-border-rounded" action='index.php' method='post'>

            <div class="uk-form-row">
                <label for="user"></label>
                    <input class="uk-width-1-4 uk-form-large" type="text" name='user' id='user' placeholder="Introduce tu usuario">
            </div>
            <div class="uk-form-row">
                <label for="pass"></label>
                    <input class="uk-width-1-4 uk-form-large" type="text" name='pass' id='pass' placeholder="Introduce tu contraseña">
            </div>
            <div class="uk-form-row">
                <label for="validatePass"></label>
                    <input class="uk-width-1-4 uk-form-large" type="text" name='validatePass' id='validatePass' placeholder="Confirma tu contraseña">
            </div>
               
            <div class="uk-form-row">
                <input type='submit' value='Entra' class="uk-width-1-6 uk-button uk-button-danger uk-button-large"/>
            </div>
            
        </form>
    </div>

</body>
</html>