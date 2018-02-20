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
		<div class="containerSobre" style="margin: 10%;">
			<h3 class="titolSobre">Con&oacutecenos y descubre porqu&eacute,</h3>
			<h3 class="titolSobre">somos la mejor opci&oacuten</h3>
			<br>
			
			<h3 class="subtitolSobre">&#191Quien somos?</h3>
			<p class="textSobre">Trabajamos desde el a&#241o 1971 con el objetivo de acoger, amparar y promover la adopci&oacuten de los animales abandonados. 
			Gestionamos centros de acogida con una filosof&iacutea proteccionista. Luchamos por la vida de los animales y trabajamos d&iacutea tras d&iacutea para evitar su sufrimiento. 
			Nuestra tarea tambi&#233n es divulgativa: concienciamos a la sociedad sobre la tendencia responsable de los animales de compa&#241&iacutea, sobre los derechos de los animales, 
			sobre los beneficios de la adopci&oacuten y sobre una buena convivencia entre los animales y los ciudadanos.</p>
			<br>
			
			<h3 class="subtitolSobre">&#191Con quien trabajamos?</h3>
			<p class="textSobre">Nuestra plataforma cuenta con la colaboraci&oacuten de m&aacutes de 120 refugios que conf&iacutean en nosotros para crear un vinculo personal 
			y cercano con los usuarios particulares que buscan aumentar su familia con un nuevo miembro. Todos los refugios colaboradores cuentan con el aprobado por el 
			Centro de Inspecci&oacuten de Refugio (CIR) asegurando que ofrecen un servicio de calidad a las mascotas que cuidan</p>
		</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>

<?php require 'footer.php';
?>
