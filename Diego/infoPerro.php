<?php
if(isset($_POST["nombrePerro"])){
	if($_POST["nombrePerro"]){

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
	$sql = "SELECT * FROM mascota";
	$result = mysqli_query($conn, $sql);
	$cont = 0;

	//Saber el numero de mascotas
	$sql2 = "SELECT COUNT(*) FROM mascota";
	$result2 = mysqli_query($conn, $sql2);
	$contSQL = mysqli_fetch_row($result2);
	$num_filas = $contSQL[0];


	//Variables BBDD, esto lo hago porque al coger las consultas me daba problemas al poner el string
	$idMascota = "idMascota";
	$idProtectora = "idProtectora";
	$comunidad = "comunidad";
	$imagenPerfil = "imagenPerfil";
	$nombre = "nombre";
	$edad = "edat";
	$unidadEdad = "unidadEdad";
	$sexo = "sexo";
	$tamaño = "tamaño";
	$raza = "raza";
	$urgente = "urgente";

	if ($num_filas > 0) {
		while ($line = mysqli_fetch_array($result)) {
			if($_POST["nombrePerro"]==$line[$nombre]){

			$sql3 = "SELECT nombre FROM raza WHERE idRaza = ".$line[$raza]."";
			$result3 = mysqli_query($conn, $sql3);	
			$razaPerro = "";
			while ($line2 = mysqli_fetch_array($result3)){
				$razaPerro = $line2[$nombre];
			}
			echo "
						
						<img class=holita src=".$line[$imagenPerfil]." alt=fotoperro height=200 width=300; style='border-radius:14px 14px 0px 0px;'>
						<div class=pbinfo style='
							border: solid 2px;
							border-radius:0px 0px 14px 14px;
							border-color:#B8B8B8;
							margin-top:-5px;'>
							<h4 class=pbnombre style='color:#F88425; margin-top:0px; margin-bottom:-15px;'>".$line[$nombre]."</h4>
							<b class=pbinfor></br>".$razaPerro."</b>
							<p style='margin-top:-4px;'>".$line[$edad]." ".$line[$unidadEdad]." · ".$line[$sexo]." · ".$line[$tamaño]."
							
						</div>
		        ";

		    

		    $num_filas--;
			}
		}
	}

	$conn->close();
	}
		
}
?>