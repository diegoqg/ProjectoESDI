<?php
    session_start(); 
	if(isset($_SESSION['login']) == false)
		require 'header_NL-B.php';
	else{
		if($_SESSION['login']==1)
			require 'header_SL-B.php';
		if($_SESSION['login']==0)
			require 'header_NL-B.php';
	}

?>
		<div class="containerContacto">
			<h3 class="titolContacto">Si tienes cualquier duda,</h3>
			<h3 class="titolContacto">env&iacuteanos un mensaje</h3>
			<form action="mailto:miusuario@miemail.com">
				<label for="fname"></label>
				<input class="inputContacto" type="text" id="fname" name="firstname" placeholder="Nombre...">

				<label for="lmail"></label>
				<input class="inputContacto" type="text" id="lmail" name="email" placeholder="Direccion de correo electronico...">

				<label for="subject"></label>
				<textarea id="subject" name="subject" placeholder="Mensaje..." style="height:200px"></textarea>

				<input class="inputContacto" type="submit" value="Enviar">
			</form>
		</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>

<?php require 'footer.php';
?>
