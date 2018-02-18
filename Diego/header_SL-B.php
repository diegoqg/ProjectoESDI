<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--CSS Diego para gen de Animales-->
    <link rel="stylesheet" href="css/css_DiegoMOD.css">

    <!-- CSS Xavito para el footer -->
    <link rel="stylesheet" href="css/demo-xavi.css">
    <link rel="stylesheet" href="css/footer-xavi.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    
<!-- CSS Y Script Murci para Modal Login -->
	<link rel="stylesheet" href="css/estiloMurciano.css">	
	<script src="js/murciscript.js"></script>

	<!--CSS y cosas Albert-->
	<link rel="stylesheet" href="css/borderAlbert.css">  

	<!--CSS y cosas Pau-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/cssPau.css" title="Color" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
	<!--CSS frankin-->
	<link rel="stylesheet" href="css/estilos.css">

  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-faded fixed-top" style="background-color: white">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" width="auto" height="50px" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <?php require 'barraDeBusqueda.php'
              ?>
              <?php require 'difUsuario.php'
              ?>

            </ul>
          </div>
        </div>
      </nav>
<section id="openLogin" class="modalDialogMurci">
				<section class="modalMurci">
					<a href="#closeMurci" class="closeM" onclick="mostraLogin(1,2)"> X </a>
					<section class='modalMurci-item login'>
					   <div>
							<button id="btnUser" class="miBtnUserN" onclick="cambiaVisibilidad(1)"> Usuario </button>
							<button id="btnRefuge" class="miBtnUserR" onclick="cambiaVisibilidad(2)"> Refugio </button>
						</div>
						<div class="form_usuarioN">
					    <form id="form_user" action="manejadorsesionN.php" method="post" >
							<div class="txt_name">
							<input name="usuarioN" type="text" placeholder="Usuario" class="camptxt" required />
							</div>
							<div class="txt_pass">
							<input name="passwordN"  type="password" placeholder="Contraseña" class="camptxt" required />
							</div>
							<div>
							<input type="submit" name="submit" value="Log In" class="btn_send">
							</div>
						</form>
						</div>
						<div class="form_usuarioR">
							<form id="form_refuge" class="form_refuge" action="manejadorsesionR.php" method="post" style="display: none;">
							<div class="txt_name">
							<input name="usuarioR" type="text" placeholder="Refugio" class="camptxt" required />
							</div>
							<div class="txt_pass">
							<input name="passwordR"  type="password" placeholder="Contraseña" class="camptxt" required />
							</div>
							<div>
							<input type="submit" name="submit" value="Log In" class="btn_send">
							</div>
							</form>
						</div>
						<p> ¿ No tienes cuenta ? </p>
						<p><a href="" >Registrate</a> ya!</p>						
					</section>  					  							 	
				</section>
			</section>
			<section id="openLoginE" class="modalDialogMurci">
				<section class="modalMurci">
					<a href="#closeMurci" class="closeM" onclick="mostraLogin(2,2)"> X </a>
					  <section class='modalMurci-item login'>
					    <div>
							<button id="btnUser2" class="miBtnUserN" onclick="cambiaVisibilidad(1)"> Usuario </button>
							<button id="btnRefuge2" class="miBtnUserR" onclick="cambiaVisibilidad(2)"> Refugio </button>
						</div>
						<div class="div_error_user">
							<p class="p_error_user">¡ E-Mail o Contraseña Incorrectos !</p>
						</div>
						<div class="form_usuarioN">
					    <form id="form_user2" action="manejadorsesionN.php" method="post" >
							<div class="txt_name">
							<input name="usuarioN" type="text" placeholder="Usuario" class="camptxt" required />
							</div>
							<div class="txt_pass">
							<input name="passwordN"  type="password" placeholder="Contraseña" class="camptxt" required />
							</div>
							<div>
							<input type="submit" name="submit" value="Log In" class="btn_send">
							</div>
						</form>
						</div>
						<div class="form_usuarioR">
							<form id="form_refuge2" class="form_refuge" action="manejadorsesionR.php" method="post" style="display: none;">
							<div class="txt_name">
							<input name="usuarioR" type="text" placeholder="Refugio" class="camptxt" required />
							</div>
							<div class="txt_pass">
							<input name="passwordR"  type="password" placeholder="Contraseña" class="camptxt" required />
							</div>
							<div>
							<input type="submit" name="submit" value="Log In" class="btn_send">
							</div>
							</form>
						</div>
						<p> ¿ No tienes cuenta ? </p>
						<p><a href="" >Registrate</a> ya!</p>						
					  </section>  					  							 	
				</section>
			</section>
    </header>
