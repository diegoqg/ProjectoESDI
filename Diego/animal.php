
		<?php
		function modalAnimal($id){
			$servername = "localhost";
			$username = "root";
			$password = "1234";
			$dbname = "pethome";
			
			$conn = new mysqli($servername, $username, $password, $dbname);
								
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
								
			$conn->set_charset("utf8");
			//Coger todas las mascotas
			$sql = "SELECT mascota.nombre AS nombreMascota, protectora.nombre, mascota.edat, mascota.sexo, mascota.tamaño, mascota.descripcion, protectora.direccion, mascota.imagenPerfil, mascota.imagen1, mascota.imagen2 FROM mascota join protectora using (idProtectora) WHERE idMascota = $id";
			$result = mysqli_query($conn, $sql);
			$cont = 0;

			
			$sql2 = "SELECT * FROM Protectora ";
			$result2 = mysqli_query($conn, $sql2);
			$contSQL = mysqli_fetch_row($result2);
			$num_filas = $contSQL[0];


			//Variables BBDD
			$idMascota = "idMascota";
			$imagen = "imagen";
			$nombre = "nombre";
			$edad = "edat";
			$nombreMascota= "nombreMascota";
			$unidadEdad = "unidadEdad";
			$sexo = "sexo";
			$tamaño = "tamaño";
			$descripcion = "descripcion";
			$direccion= "direccion";
			$imagenPerfil = "imagenPerfil";
			$imagen1 = "imagen1";
			$imagen2 = "imagen2";
			if ($num_filas > 0) {
			while ($line = mysqli_fetch_array($result) ) {
			  
				echo "
				    <div class=\"contenedor\">
					<section id=\"openmodal".$id."\" class=\"modalDialog\">
					<section class=\"modal\">
					<a href=\"#close\" class=\"close\" onclick=\"mostraLogin1(1,2)\"> X </a>
					   	 <section class='modal-item uno'>
						  	<div class=\"titulo\">
						   		<h2>".$line[$nombreMascota]."</h2>
							</div>
							<div class=\"ubicacion\">
								<p><img src=\"images/ubicacion.png\">".$line[$direccion]."</p>
							</div>
							<div class=\"infoAnimal\">
						    	<p>".$line[$edad]." años · ".$line[$sexo]." · ".$line[$tamaño]."</p>
						    </div>
						    <div class=\"linkProtectora\">
						    	<a href=\"protectora.php\"><img src=\"images/caseta.png\">".$line[$nombre]."</a>
							</div>
						    <br>
						    <div class=\"contenidoPerfil\">
						    	<p>".$line[$descripcion]." </p>
							</div>
						    <div class=\"buttons\">
							   <form>
							   	 	<input type=\"button\" onclick=\"window.location.href='mailto:protectora@example.com?Subject=Urgente';\" value=\"Contacta con el refugio\" class=\"button\" />
							   	 	<input type=\"button\" onclick=\"window.location.href='mailto:protectora@example.com?Subject=".$line[$nombreMascota]."';\" value=\"Apadrina a ".$line[$nombreMascota]."\" class=\"button\" />
								    <button class=\"button\">Compartir</button>
								 </form>
							</div>
						  </section>
						  <section class=\"imagen\">
						  	<div class=\"slideshow-container\">

								<div class=\"mySlides fade\">
								  <div class=\"numbertext\">1 / 3</div>
								  <img src=".$line[$imagenPerfil]." style=\"width:100%\">
								
								</div>

								<div class=\"mySlides fade\">
								  <div class=\"numbertext\">2 / 3</div>
								  <img src=".$line[$imagen1]." style=\"width:100%\">
								
								</div>

								<div class=\"mySlides fade\">
								  <div class=\"numbertext\">3 / 3</div>
								  <img src=".$line[$imagen2]." style=\"width:100%\">
								 
								</div>

								<a class=\"prev\" onclick=\"plusSlides(-1)\">&#10094;</a>
								<a class=\"next\" onclick=\"plusSlides(1)\">&#10095;</a>

								</div>
								<br>

								<div style=\"text-align:center\">
								  <span class=\"dot\" onclick=currentSlide(1)></span> 
								  <span class=\"dot\" onclick=currentSlide(2)></span> 
								  <span class=\"dot\" onclick=currentSlide(3)></span> 
								</div>
							</section>	

								<script>
								var slideIndex = 1;
								showSlides(slideIndex);

								function plusSlides(n) {
								  showSlides(slideIndex += n);
								}

								function currentSlide(n) {
								  showSlides(slideIndex = n);
								}

								function showSlides(n) {
								  var i;
								  var slides = document.getElementsByClassName('mySlides');
								  var dots = document.getElementsByClassName('dot');
								  if (n > slides.length) {slideIndex = 1}    
								  if (n < 1) {slideIndex = slides.length}
								  for (i = 0; i < slides.length; i++) {
								      slides[i].style.display = 'none';  
								  }
								  for (i = 0; i < dots.length; i++) {
								      dots[i].className = dots[i].className.replace('active', '' );
								  }
								  slides[slideIndex-1].style.display = \"block\";  
								  dots[slideIndex-1].className += \" active\";
								}
								</script>
						 		
						 	
							</section>
						</section>
						</section>
					</section> 
				</div>
			";
			    
				  

			    $num_filas--;
			
			}
		}

		$conn->close();
		}

	?>

