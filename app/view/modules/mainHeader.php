
    <!-- NAVBAR 1 -->

    <nav class="uk-navbar">

      <!-- LOGO -->

      <div  class="uk-navbar-nav">

        <ul class="uk-navbar-nav">
  					
  			 <li class="logo"> <img src="app/view/img/pokeball.png" class="uk-animation-shake"> </li>

        </ul>

      </div>
    	
      <!-- LOGUIN -->

      <div  class="uk-navbar-flip">

        <ul class="uk-navbar-nav ">
  					
  				<li class="uk-button-danger"> <a href="#modalLogin" data-uk-modal>LOGIN</a></li>

  			</ul>

  		</div>

		</nav>

    <!-- NARBAR 2 -->

		<div class="uk-tab-center">
    		
    		<ul class="uk-tab uk-animation-fade uk-animation-5" data-uk-tab>

    		<li> <a href="#Noticias" > NOTICIAS </a> </li>
            <li> <a href="#news"> TIPS </a> </li>
            <li> <a href="#modalRegister" data-uk-modal> FAIL </a> </li>

    		</ul>

    </div>
		


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
