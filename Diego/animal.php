
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
			$sql = "SELECT mascota.nombre AS nombreMascota, protectora.nombre, mascota.idProtectora AS idProtectora, mascota.edat, mascota.sexo, mascota.tamaño, mascota.descripcion, protectora.direccion, mascota.imagenPerfil, mascota.imagen1, mascota.imagen2 FROM mascota join protectora using (idProtectora) WHERE idMascota = $id";
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
			$idProtectora = "idProtectora";
			if ($num_filas > 0) {
			while ($line = mysqli_fetch_array($result) ) {
			  
				echo "
				    <div class=\"contenedor\">
					<section id=\"openmodal".$id."\" class=\"modalDialog\">
					<section class=\"modal\">
					<a href=\"#close\" class=\"close\" onclick=\"mostraModal(1,2,".$id.")\"> X </a>
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
						    	<a href=protectora.php?id=".$line[$idProtectora]." onclick=\"mostraModal(1,2,".$id.")><img src=\"images/caseta.png\">".$line[$nombre]."</a>
							</div>
						    <br>
						    <div class=\"contenidoPerfil\">
						    	<p>".$line[$descripcion]." </p>
							</div>
						    <div class=\"buttons\">
							   <form>
							   	 	<input type=\"button\" onclick=\"window.location.href='contacto.php';\" value=\"Contacta con el refugio\" class=\"button\" />
							   	 	<input type=\"button\" onclick=\"window.location.href='mailto:protectora@example.com?Subject=".$line[$nombreMascota]."';\" value=\"Apadrina a ".$line[$nombreMascota]."\" class=\"button\" />
								    <button class=\"button\">Compartir</button>
								 </form>
							</div>
						  </section>
						  <section class=\"imagen\" >
						  	  <div id=\"carousel".$id."\" class=\"carousel slide\" data-ride=\"carousel\">
						      <ol class=\"carousel-indicators\">
						        <li data-target=\"#carousel".$id."\" data-slide-to=\"0\" class=\"active\"></li>
						        <li data-target=\"#carousel".$id."\" data-slide-to=\"1\"></li>
						        <li data-target=\"#carousel".$id."\" data-slide-to=\"2\"></li>
						      </ol>
						      <div class=\"carousel-inner\" role=\"listbox\" style=\"width: 100%; height: 45%;\">
						        <div class=\"carousel-item active\">
						          <img class=\"d-block img-fluid\" src=".$line[$imagenPerfil]." alt=\"First slide\">
						        </div>
						        <div class=\"carousel-item\">
						          <img class=\"d-block img-fluid\" src=".$line[$imagen1]." alt=\"Second slide\">
						        </div>
						        <div class=\"carousel-item\">
						          <img class=\"d-block img-fluid\" src=".$line[$imagen2]." alt=\"Third slide\">
						        </div>
						      </div>
						      <a class=\"carousel-control-prev\" href=\"#carousel".$id."\" role=\"button\" data-slide=\"prev\">
						        <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
						        <span class=\"sr-only\">Previous</span>
						      </a>
						      <a class=\"carousel-control-next\" href=\"#carousel".$id."\" role=\"button\" data-slide=\"next\">
						        <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
						        <span class=\"sr-only\">Next</span>
						      </a>
						    </div>

						 		
						 	
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

