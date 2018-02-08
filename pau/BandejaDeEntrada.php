<!DOCTYPE html>
<html lang="es">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="cssPau.css" title="Color" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<body>
	
	<script type="text/javascript">
		function verMensaje(){
			var nombrePerro = $('.PBmensajeNombrePerroFuera').val();
			
			var nombrePerro = document.getElementById('PBnombrePerro').value;
			$.post("prueba.php",{"nombre":nombrePerro},function(respuesta){
				alert(respuesta);
			});
			
			var miVariableJS=$("#texto").val();
 
			$.post("archivo.php",{"texto":miVariableJS},function(respuesta){
				alert(respuesta);
			});
		}
		
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
			<?php
			
			function subirMensaje(){
				echo "holita guapo";
				/*$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "pethome";

				$conn = new mysqli($servername, $username, $password, $dbname);
									
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
									
				$conn->set_charset("utf8");
				*/
				
				
				$conn->close();
			}
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "pethome";

				$conn = new mysqli($servername, $username, $password, $dbname);
				
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				
				$conn->set_charset("utf8");
				
				
				$sql = "SELECT * FROM mensajeria GROUP BY idMascota";
				$result = mysqli_query($conn, $sql);
				$sqlcontador = "SELECT DISTINCT idMascota FROM mensajeria";
				$resultcontador = mysqli_query($conn, $sqlcontador);
				$contSQL = $resultcontador->num_rows;
				
				
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
				echo "<div class=PBbandejaMensajesFuera>";
				if ($contSQL > 0) {
					while ($line = mysqli_fetch_array($result)) {
							$sql2 = "SELECT * FROM mascota";
							$result2 = mysqli_query($conn, $sql2);
							
							while($line2 = mysqli_fetch_array($result2)){
								if($line2[$idMascota]==$line[$idMascota]){
									echo "<img class=PBimagenMensajeFuera src=".$line2[$imagenPerro]." alt=fotoPerro height=55 width=55>";
							
									$sql3 = "SELECT * FROM raza";
									$result3 = mysqli_query($conn, $sql3);
									
									while($line3 = mysqli_fetch_array($result3)){
										if($line2[$raza]==$line3[$idraza]){
											$sql4 = "SELECT mensaje FROM mensajeria WHERE fecha=(SELECT MAX(fecha) FROM mensajeria WHERE idMascota='".$line2[$idMascota]."')";
											$result4 = mysqli_query($conn, $sql4);
											
											
											while($line4 = mysqli_fetch_array($result4)){
													echo "	<div class=PBmensajeFueraDIV onclick=verMensaje();>
																<p id=PBnombrePerro class=PBmensajeNombrePerroFuera>".$line2[$nombre]."</p>
																<p class=PBmensajeRazaPerroFuera>".$line3[$nombre]."</p>
																<p class=PBmensajeFuera>".getSubString($line4[$mensaje],null)."</p>
															</div>";
											}
										}
									}
								}
							}
						if($contSQL!=1){
							echo"<hr>";
						}
						$contSQL--;
					}
				}else{
					echo "<div class=PBmensajeFueraDIV>
					<p class=PBmensajeNombrePerroFuera></p>
					<p class=PBmensajeRazaPerroFuera>No hay mensajes</p>
					</div>";
				}
				echo "</div>";
				
				
				$sql = "SELECT * FROM mensajeria GROUP BY idMascota";
				$result = mysqli_query($conn, $sql);
				$sqlcontador = "SELECT DISTINCT idMascota FROM mensajeria";
				$resultcontador = mysqli_query($conn, $sqlcontador);
				$contSQL = $resultcontador->num_rows;
				
				echo "<div class=PBmensajeVentana>	
					<!-- Cabecera del chat de mensajeria. -->
					<img class=PBimagenVisitanteVentana src=imagenes/persona.jpg alt=fotoPersona height=55 width=55>
					<div class=PBdivVentana>
					<p class=PBmensajeNombreLocal>Carmen Gonzalez</p>
					<p class=PBmensajeNombreVisitante>Asociación Animales Libres y Salvajes</p>
					</div>
					<hr>
					<div class=PBmensajes>
					<div class=PBmensajeLocal>
					<p class=PBmensajeTexto>Hola! Nos ha gustado mucho Coco. Queremos más info!</p>
					<p class=PBmensajeFecha> 8 de dic. de 2017</p>
					</div>
					<img class=PBimagenLocal src=imagenes/persona1.jpg alt=fotoPersona height=55 width=55>
				
					<div class=PBmensajeVisitante>
					<p class=PBmensajeTexto>Hola! Gracias por contactarnos, normalmente quedamos con los interesados en adoptar para que conozcan al animal.¿Cuando os iria bien venir al refugio?</p>
					<p class=PBmensajeFecha> 8 de dic. de 2017</p>
					</div>
					<img class=PBimagenVisitante src=imagenes/persona.jpg alt=fotoPersona height=55 width=55>
				
					<div class=PBmensajeLocal>
					<p class=PBmensajeTexto>Pues nos iria bien el próximo jueves por la tarede, va bien?</p>
					<p class=PBmensajeFecha> 8 de dic. de 2017</p>
					</div>
					<img class=PBimagenLocal src=imagenes/persona1.jpg alt=fotoPersona height=55 width=55>
					</div>
					<div class=PBtxt>
					<form name=form action method=get onsubmit=subirMensaje()>
					<textarea class=PBtextoEnviar id=PBtextoEnviar placeholder=Escribe un mensaje... row=1></textarea>
					<button class=PBboton type=submit onclick=enviar()>Enviar</button>
					</form>
					</div>
					</div>";
				
				
				
				
				$conn->close();
				

		
				
				
				
			function getSubString($string, $length=NULL){
				if ($length == NULL)
					$length = 23;
				$stringDisplay = substr(strip_tags($string), 0, $length);
				if (strlen(strip_tags($string)) > $length)
					$stringDisplay .= ' ...';
				return $stringDisplay;
			}
			
			
			?>
		</div>
	</body>
</html>