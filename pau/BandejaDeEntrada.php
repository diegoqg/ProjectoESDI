<!DOCTYPE html>
<html lang="es">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="cssPau.css" title="Color" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<body>
	
	
	<script type="text/javascript">
		<!--Funció per enviar missatges -->
		function enviar(){
			var fecha = new Date();
			var dia = fecha.getDate();
			var mes = fecha.getMonth();
			var año = fecha.getFullYear();
			
			if(dia<10){
				dia='0'+dia
			}
			
			var txt = document.getElementById('PBtextoEnviar').value;
			
			var meses = ["ene","feb","mar","abr","may","jun","jul","ago","sep","oct","nov","dic"];
			if(txt==""){
			}else{
				$('.PBmensajes').append('<div class="PBmensajeLocal"><p class="PBmensajeTexto">'+txt+'</p><p class="PBmensajeFecha"> '+dia+' de '+meses[mes]+'. de '+año+'</p></div>');
				$('.PBmensajes').append('<img class="PBimagenLocal" src="imagenes/persona1.jpg" alt="fotoPersona" height="55" width="55">');
				
				actualizarDiv();
				$('.PBtextoEnviar').val('');
			}
		}
		<!--Scroll del panell de missatges-->
		function actualizarDiv(){
			$(".PBmensajes").animate({ scrollTop: $('.PBmensajes')[0].scrollHeight}, 100);
		}
	</script>
	
	
		<!-- panell dels diferents missatges -->
		<div class="contenido">
		<div class="PBbandejaMensajesFuera">
			
			
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "pethome";

				$conn = new mysqli($servername, $username, $password, $dbname);
									
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
									
				$conn->set_charset("utf8");
				//Coger todos los mensajes
				
				
				$sql = "SELECT DISTINCT * FROM mensajeria GROUP BY idMascota";
				$result = mysqli_query($conn, $sql);
				$cont = 0;
				
				$idUsuario = "idUsuario";
				$idProtectora = "idProtectora";
				$idMascota = "idMascota";
				$idMensaje = "idMensaje";
				$mensaje = "mensaje";
				$fecha = "fecha";
				$nombre = "nombre";
				$imagenPerro = "imagenPerfil";
				$imagen = "imagen";
				$raza = "raza";
				$idraza = "idRaza";
				
				$sql2 = "SELECT COUNT(*) FROM mensajeria";
				$result2 = mysqli_query($conn, $sql2);
				$contSQL = mysqli_fetch_row($result2);
				$num_filas = $contSQL[0];

				echo $num_filas;
				
				if ($num_filas > 0) {
					while ($line = mysqli_fetch_array($result)) {
							$sql3 = "SELECT * FROM mascota";
							$result3 = mysqli_query($conn, $sql3);
							
							if($line2 = mysqli_fetch_array($result3)){
								if($line2[$idMascota]==$line[$idMascota]){
									echo "<img class=PBimagenMensajeFuera src=".$line2[$imagenPerro]." alt=fotoPerro height=55 width=55>";
							
									$sql4 = "SELECT * FROM raza";
									$result4 = mysqli_query($conn, $sql4);
									
									if($line3 = mysqli_fetch_array($result4)){
										if($line2[$raza]==$line3[$idraza]){
											echo "	<div class=PBmensajeFueraDIV>
														<p class=PBmensajeNombrePerroFuera>".$line2[$nombre]."</p>
														<p class=PBmensajeRazaPerroFuera>".$line3[$nombre]."</p>
														<p class=PBmensajeFuera>".$line[$mensaje]."</p>
													</div>";
										}
									}
								}
							}

						if($num_filas!=1){
							echo"<hr>";
						}
						$num_filas--;
					}
				}

				$conn->close();
			?>
		</div>
		
		<!-- Panell de missatges per un animal  finestra central-->
		<div class="PBmensajeVentana">	
			<!-- Cabecera del chat de mensajeria. -->
			<img class="PBimagenVisitanteVentana" src="imagenes/persona.jpg" alt="fotoPersona" height="55" width="55">
			<div class="PBdivVentana">
				<p class="PBmensajeNombreLocal">Carmen Gonzalez</p>
				<p class="PBmensajeNombreVisitante">Asociación Animales Libres y Salvajes</p>
			</div>
			<hr>
			
			
			
			<div class="PBmensajes">
				<!-- Contenido interno del chat de mensajeria. -->
				<div class="PBmensajeLocal">
					<p class="PBmensajeTexto">Hola! Nos ha gustado mucho Coco. Queremos más info!</p>
					<p class="PBmensajeFecha"> 8 de dic. de 2017</p>
				</div>
				<img class="PBimagenLocal" src="imagenes/persona1.jpg" alt="fotoPersona" height="55" width="55">
				
				<div class="PBmensajeVisitante">
					<p class="PBmensajeTexto">Hola! Gracias por contactarnos, normalmente quedamos con los interesados en adoptar para que conozcan al animal.¿Cuando os iria bien venir al refugio?</p>
					<p class="PBmensajeFecha"> 8 de dic. de 2017</p>
				</div>
				<img class="PBimagenVisitante" src="imagenes/persona.jpg" alt="fotoPersona" height="55" width="55">
				
				<div class="PBmensajeLocal">
					<p class="PBmensajeTexto">Pues nos iria bien el próximo jueves por la tarede, va bien?</p>
					<p class="PBmensajeFecha"> 8 de dic. de 2017</p>
				</div>
				<img class="PBimagenLocal" src="imagenes/persona1.jpg" alt="fotoPersona" height="55" width="55">
			</div>
			
			
			<!-- TextArea del chat de mensajeria. -->
			<div class="PBtxt">
				<textarea class="PBtextoEnviar" id="PBtextoEnviar" placeholder="Escribe un mensaje..." row="1"></textarea>
				<button class="PBboton" onclick="enviar();">Enviar</button>
			</div>
		</div>
		</div>
	</body>
</html>