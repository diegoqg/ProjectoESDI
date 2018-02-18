<?php
if(isset($_POST["nombrePerro"])){
	if($_POST["nombrePerro"]){
		session_start();
		$servername = "localhost";
		$username = "root";
		$password = "1234";
		$dbname = "pethome";

		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
			
		$conn->set_charset("utf8");
		
		$tipo=$_SESSION['tipo'];
		$id=1;
		$idVisitante="idUsuario";
		$flag=0;
		$flag1=0;
		$nomVisitante="";
		$nomProtectora="";
		$fotoVisitante="";
		$nomLocal="";
		$fotoLocal="";
		
		$sql = "SELECT * FROM mensajeria WHERE idMascota = (SELECT idMascota FROM mascota WHERE nombre LIKE '".$_POST["nombrePerro"]."') ORDER BY fecha";
		$result = mysqli_query($conn, $sql);
		$resultcontador = mysqli_query($conn, $sql);
		$contSQL = $resultcontador->num_rows;
		
		
		$contador=$contSQL;
		if ($contSQL > 0) {
			while ($line = mysqli_fetch_array($result)) {
				if($tipo=="protectora"){
					
					if($flag==0){
						$sql3 = "SELECT * FROM usuario WHERE idUsuario=".$line[$idVisitante]." LIMIT 1";
						$result3 = mysqli_query($conn, $sql3);
						while ($line3 = mysqli_fetch_array($result3)){
							$nomVisitante=$line3["nombre"]." ".$line3["apellido1"]." ".$line3["apellido2"];
							$fotoVisitante=$line3["imagen"];
							echo "	<img class=PBimagenVisitanteVentana src=".$fotoVisitante." alt=fotoProtectora height=55 width=55>
									<div class=PBdivVentana>
										<p class=PBmensajeNombreLocal>".$nomVisitante."</p>
										<p class=PBmensajeNombreVisitante></p>
									</div>
									<hr>";
						}
						$flag=1;
					}
					if($flag1==0){
						$sql2 = "SELECT * FROM protectora WHERE idProtectora=".$id." LIMIT 1";
						$result2 = mysqli_query($conn, $sql2);
						while ($line2 = mysqli_fetch_array($result2)){
							$fotoLocal=$line2["imagen_contacto"];
						}
						$flag1=1;
					}
					if($contador==$contSQL){
						echo	"<div class=PBmensajes id=PBmensajes>";
					}
					if($line["propietario"]==1){
						echo	"
								<div class=PBmensajeVisitante>
									<p class=PBmensajeTexto>".$line["mensaje"]."</p>
									<p class=PBmensajeFecha>".$line["fecha"]."</p>
								</div>
								<img class=PBimagenVisitante src=".$fotoVisitante." alt=fotoPersona height=55 width=55>
								";
					}
					if($line["propietario"]==2){
						echo	"
								<div class=PBmensajeLocal>
									<p class=PBmensajeTexto>".$line["mensaje"]."</p>
									<p class=PBmensajeFecha>".$line["fecha"]."</p>
								</div>
								<img class=PBimagenLocal src=".$fotoLocal." alt=fotoPersona height=55 width=55>
								";
					}
					if($contSQL==1){
						echo	"
								</div>
								<div class=PBtxt>
									<form id=form name=form action method=get onsubmit=subirMensaje()>
										<textarea name=mensaje class=PBtextoEnviar id=PBtextoEnviar placeholder=Escribe un mensaje... row=1></textarea>
										<button class=PBboton id=".$line[$idVisitante]." type=submit onclick=enviar(this)>Enviar</button>
									</form>
								</div>
								</div>
								";
					}
					$contSQL=$contSQL-1;
				}
				if($tipo=="usuario"){
					
					if($flag==0){
						$sql3 = "SELECT * FROM protectora WHERE idProtectora=".$line[$idVisitante]." LIMIT 1";
						$result3 = mysqli_query($conn, $sql3);
						while ($line3 = mysqli_fetch_array($result3)){
							$nomVisitante=$line3["nombre_contacto"]." ".$line3["apellido_contacto"];
							$fotoVisitante=$line3["imagen_contacto"];
							$nomProtectora=$line3["nombre"];
							echo "	<img class=PBimagenVisitanteVentana src=".$fotoVisitante." alt=fotoProtectora height=55 width=55>
									<div class=PBdivVentana>
										<p class=PBmensajeNombreLocal>".$nomVisitante."</p>
										<p class=PBmensajeNombreVisitante>".$nomProtectora."</p>
									</div>
									<hr>";
						}
						$flag=1;
					}
					if($flag1==0){
						$sql2 = "SELECT * FROM usuario WHERE idUsuario=".$id." LIMIT 1";
						$result2 = mysqli_query($conn, $sql2);
						while ($line2 = mysqli_fetch_array($result2)){
							$fotoLocal=$line2["imagen"];
						}
						$flag1=1;
					}
					if($contador==$contSQL){
						echo	"<div class=PBmensajes>";
					}
					if($line["propietario"]==2){
						echo	"
								<div class=PBmensajeVisitante>
									<p class=PBmensajeTexto>".$line["mensaje"]."</p>
									<p class=PBmensajeFecha>".$line["fecha"]."</p>
								</div>
								<img class=PBimagenVisitante src=".$fotoVisitante." alt=fotoPersona height=55 width=55>
								";
					}
					if($line["propietario"]==1){
						echo	"
								<div class=PBmensajeLocal>
									<p class=PBmensajeTexto>".$line["mensaje"]."</p>
									<p class=PBmensajeFecha>".$line["fecha"]."</p>
								</div>
								<img class=PBimagenLocal src=".$fotoLocal." alt=fotoPersona height=55 width=55>
								";
					}
					if($contSQL==1){
						echo	"
								</div>
								<div class=PBtxt>
									<form name=form action method=get onsubmit=subirMensaje()>
										<textarea class=PBtextoEnviar id=PBtextoEnviar placeholder=Escribe un mensaje... row=1></textarea>
										<button class=PBboton id=".$line[$idVisitante]." type=submit onclick=enviar(this)>Enviar</button>
									</form>
								</div>
								</div>
								";
					}
					$contSQL=$contSQL-1;
				}					
			}
		}
		$conn->close();
	}
		
}

?>