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
	<script type="text/javascript">
		var nombrePerroAnterior;
		function verMensaje(perro){
			if(nombrePerroAnterior!=perro.id){
				nombrePerroAnterior=perro.id;
				document.getElementById('PBinformacion').innerHTML='';
				document.getElementById('PBventana').innerHTML='';
				$.post("ventana.php",{"nombrePerro":perro.id},function(respuesta){
					$('.PBmensajeVentana').append(respuesta);
				});
				
				
				$.post("infoPerro.php",{"nombrePerro":perro.id},function(respuesta){
					$('.PBimagenPerroGeneral').append(respuesta);
				});
			}
		}
		function enviar(vis){
			mensaje=document.getElementById('PBtextoEnviar').value;
			
			$.post("enviar.php",{"nombrePerro":nombrePerroAnterior,"idvis":vis.id,"mensaje":mensaje},function(respuesta){
				alert(respuesta);
				document.getElementById('PBinformacion').innerHTML='';
				$.post("ventana.php",{"nombrePerro":nombrePerroAnterior},function(respuesta){
					$('.PBmensajeVentana').append(respuesta);
				});
			});
		}
		<!--Scroll del panell de missatges-->
		function actualizarDiv(){
			$('.PBmensajes').animatescroll({ element:'.PBmensajes', padding:20});
		}
	</script>
	
	
		<!-- panell dels diferents missatges -->
		<div class="contenido">
			<?php
				include 'ventana.php';
				include 'infoPerro.php';
				include 'enviar.php';
			
				$servername = "localhost";
				$username = "root";
				$password = "1234";
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
									echo "<img class=PBimagenMensajeFuera src=".$line2[$imagenPerro]." alt=fotoPerro height=55 width=55 >";
							
									$sql3 = "SELECT * FROM raza";
									$result3 = mysqli_query($conn, $sql3);
									
									while($line3 = mysqli_fetch_array($result3)){
										if($line2[$raza]==$line3[$idraza]){
											$sql4 = "SELECT mensaje FROM mensajeria WHERE fecha=(SELECT MAX(fecha) FROM mensajeria WHERE idMascota='".$line2[$idMascota]."')";
											$result4 = mysqli_query($conn, $sql4);
											
											
											while($line4 = mysqli_fetch_array($result4)){
												
													echo "	<div id=".$line2[$nombre]." class=PBmensajeFueraDIV onclick=verMensaje(this)>
																<p class=PBmensajeNombrePerroFuera> ".$line2[$nombre]."</p>
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
		
			<div class="PBmensajeVentana" id="PBventana">
			</div>
			<div class="PBimagenPerroGeneral" id="PBinformacion">
			</div>
			</div>
		</div>
		<div style = "margin-bottom: 55%;"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   --> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>

<?php require 'footer.php';
?>
