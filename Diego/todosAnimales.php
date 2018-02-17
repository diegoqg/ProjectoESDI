<?php
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
		    if($cont == 0){
		    echo "<div class=container>
      				<div class=row>";
		    }

		    //Coger datos de la protectora a la que pertenece cada perro
			$sql3 = "SELECT nombre, comunidad FROM protectora WHERE idProtectora = ".$line[$idProtectora]."";
			$result3 = mysqli_query($conn, $sql3);
			$direccion = "direccion";	
			$comunidadProtectora = "";
			$nombreProtectora = "";
			while ($line2 = mysqli_fetch_array($result3)){

					$nombreProtectora = $line2[$nombre];
					//Coger datos de la comunidad autonomaa la que pertenece cada perro
					$sql4 = "SELECT comunidad FROM comunidades WHERE idComunidad = ".$line2[$comunidad]."";
					$result4 = mysqli_query($conn, $sql4);
					
					while ($line3 = mysqli_fetch_array($result4)){
						$comunidadProtectora = $line3[$comunidad];
					}

			}


			$sql3 = "SELECT nombre FROM raza WHERE idRaza = ".$line[$raza]."";
			$result3 = mysqli_query($conn, $sql3);
			$direccion = "direccion";	
			$razaPerro = "";
			while ($line2 = mysqli_fetch_array($result3)){
				$razaPerro = $line2[$nombre];
			}
			if(strcmp($line[$urgente],"Si")==0)
				echo "<div class=col-xl-3 col-lg-4 col-md-6 col-sm-12 card id=pruebaUrgente style=width: 20rem;>
		          <a href=animal.php?id=".$line[$idMascota].">
		          	<img class=card-img-top src=".$line[$imagenPerfil]." alt=Card image cap>
		          </a>
		          <p><b>¡URGENTE!</b></p> 
		          <div class=card-block>
		          <h4 class=card-title style=color:#F88425;>".$line[$nombre]."</h4>
		            <p class=card-text><img src=images/ubicacion.png width=25px height=25px alt=iconoUbicacion> <b>".$comunidadProtectora."</b></br>
		            ".$line[$edad]." ".$line[$unidadEdad]." · ".$line[$sexo]." · ".$line[$tamaño]." · ".$razaPerro."</br>
		            <a href=protectora.php?id=".$line[$idProtectora].">
                  <u style = color:#F88425;><img src=images/caseta.png width=25px height=25px alt=iconoUbicacion>".$nombreProtectora."</u>
                </a>
		          </div>
		        </div>";

		    else
				echo "<div class=col-xl-3 col-lg-4 col-md-6 col-sm-12 card style=width: 20rem; onclick=frankmodal(".$line[$idMascota].")>
		          <a href=animal.php?id=".$line[$idMascota].">
		          	<img class=card-img-top src=".$line[$imagenPerfil]." alt=Card image cap>
		          </a>
		          <div class=card-block>
		          <h4 class=card-title style=color:#F88425;>".$line[$nombre]."</u></h4>
		            <p class=card-text><img src=images/ubicacion.png width=25px height=25px alt=iconoUbicacion> <b>".$comunidadProtectora."</b></br>
		            ".$line[$edad]." ".$line[$unidadEdad]." · ".$line[$sexo]." · ".$line[$tamaño]." · ".$razaPerro."</br>
                <a href=protectora.php?id=".$line[$idProtectora].">
		              <u style = color:#F88425;><img src=images/caseta.png width=25px height=25px alt=iconoUbicacion> ".$nombreProtectora."</u>
                </a>
		          </div>
		        </div>";

		        $cont++;
		    if($cont == 4 or $num_filas == 1){
		    	 echo"</div>
	   			 </div></br></br>";
		    	$cont = 0;
		    }

		    $num_filas--;
		}
	}

	$conn->close();
?>