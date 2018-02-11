<?php
	$servername = "localhost"; //Datos para la conexión a la base de datos
	$username = "root";
	$password = "";
	$dbname = "pethome";

	$conn = new mysqli($servername, $username, $password, $dbname); //Conexión a la base de datos
	
	if ($conn->connect_error) { //Control de la conexión
		die("Connection failed: " . $conn->connect_error);
	}
	
	$conn->set_charset("utf8"); //Codificación
	
	$sql = null; //Iniciar la variable consulta
	/*
	Este es INICIO del selector de posibilidades de filtrado del buscador
	Como hay 4 campos los cuales se pueden utilizar o no, llego a la conclusión de 4 ^ 2 = 16
	16 son las combinaciones posibles en que puede estar la barra de búsqueda
	Este código prepara la consulta a la base de datos según el número de filtros utilizados
	*/
	if($_POST["raza"] == "default"){
		if($_POST["ubicacion"] == "default"){
			if($_POST["sexo"] == "default"){
				if($_POST["filtro"] != "default"){
					$sql = "ORDER BY " .$_POST["filtro"];
				}
			}else{
				if($_POST["filtro"] == "default"){
					$sql = "WHERE m.sexo LIKE '" .$_POST["sexo"]. "'";
				}else{
					$sql = "WHERE m.sexo LIKE '" .$_POST["sexo"]. "' ORDER BY " .$_POST["filtro"];
				}
			}
		}else{
			if($_POST["sexo"] == "default"){
				if($_POST["filtro"] == "default"){
					$sql = "WHERE p.comunidad = " .$_POST["ubicacion"];
				}else{
					$sql = "WHERE p.comunidad = " .$_POST["ubicacion"]. " ORDER BY " .$_POST["filtro"];
				}
			}else{
				if($_POST["filtro"] == "default"){
					$sql = "WHERE p.comunidad = " .$_POST["ubicacion"]. " AND m.sexo LIKE '" .$_POST["sexo"]. "'";
				}else{
					$sql = "WHERE p.comunidad = " .$_POST["ubicacion"]. " AND m.sexo LIKE '" .$_POST["sexo"]. "' ORDER BY " .$_POST["filtro"];
				}
			}
		}
	}else{
		if($_POST["ubicacion"] == "default"){
			if($_POST["sexo"] == "default"){
				if($_POST["filtro"] == "default"){
					$sql = "WHERE m.raza = " .$_POST["raza"];
				}else{
					$sql = "WHERE m.raza = " .$_POST["raza"]. " ORDER BY " .$_POST["filtro"];
				}
			}else{
				if($_POST["filtro"] == "default"){
					$sql = "WHERE m.raza = " .$_POST["raza"]. " AND m.sexo LIKE '" .$_POST["sexo"]. "'";
				}else{
					$sql = "WHERE m.raza = " .$_POST["raza"]. " AND m.sexo LIKE '" .$_POST["sexo"]. "' ORDER BY " .$_POST["filtro"];
				}
			}
		}else{
			if($_POST["sexo"] == "default"){
				if($_POST["filtro"] == "default"){
					$sql = "WHERE m.raza = " .$_POST["raza"]. " AND p.comunidad = " .$_POST["ubicacion"];
				}else{
					$sql = "m.raza = " .$_POST["raza"]. " AND p.comunidad = " .$_POST["ubicacion"]. " ORDER BY " .$_POST["filtro"];
				}
			}else{
				if($_POST["filtro"] == "default"){
					$sql = "WHERE m.raza = " .$_POST["raza"]. " AND p.comunidad = " .$_POST["ubicacion"]. " AND m.sexo LIKE '" .$_POST["sexo"]. "'";
				}else{
					$sql = "WHERE m.raza = " .$_POST["raza"]. " AND p.comunidad = " .$_POST["ubicacion"]. " AND m.sexo LIKE '" .$_POST["sexo"]. "' ORDER BY " .$_POST["filtro"];
				}
			}
		}
	}
	//Este es FIN del selector de posibilidades de filtrado del buscador
	$sqlCount = "SELECT count(*) FROM mascota JOIN protectora ON mascota.idProtectora = protectora.idProtectora JOIN comunidades ON protectora.comunidad = comunidades.idComunidad JOIN raza ON mascota.raza = raza.idRaza " .$sql; //Número de regristros que devuelve la consulta
	$sql = "SELECT * FROM mascota JOIN protectora ON mascota.idProtectora = protectora.idProtectora JOIN comunidades ON protectora.comunidad = comunidades.idComunidad JOIN raza ON mascota.raza = raza.idRaza " .$sql; //Consulta final
	$result = mysqli_query($conn, $sql); //Ejecución de la consulta final
	
	$resultCount = mysqli_query($conn, $sqlCount); //
	if ($resultCount->num_rows == 0)
		echo "<h1 id=titleNaranjito> No se han encontrado animales con estas caracteristicas</h1>";
	else if ($resultCount->num_rows > 0) {
		while($rowCount = $resultCount->fetch_assoc()) {
			// Código para representar visualmente el número de regristros que devuelve la consulta, utilizar la variable $rowCount["count(*)"]
		}
	} else {
		echo "Algo ha salido mal :C";
	}
	//Esto es se usa para guardar las variables y luego poder printearlas (problemas con el echo y el "")
	$numFilas = $rowCount["count(*)"];
	$cont = 0;

	$idMascota = "mascota.idMascota";
	$nombreMascota = "mascota.nombre";
	$edadMascota = "mascota.edat";
	$uEdadMAscota = "mascota.unidadEdad";
	$tamMascota = "mascota.tamaño";
	$sexoMascota = "mascota.sexo";
	$urgMascota = "mascota.urgente";
	$imgPerfilMascota = "mascota.imagenPerfil";
	$nombreRaza = "raza.nombre";
	$nombreProtectora = "protectora.nombre";
	$nombreComunidad = "comunidades.comunidad";

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			/*
			Código para representar visualmente los perros que devuelve la consulta
			Variables relevantes:
			$row["m.idMascota"] --> Id de la mascota
			$row["m.nombre"] --> Nombre de la mascota
			$row["m.edat"] --> Edad de la mascota
			$row["m.unidadEdad"] --> Unidad de edad de la raza de la mascota
			$row["m.tamaño"] --> Tamaño de la mascota
			$row["m.sexo"] --> Sexo de la mascota
			$row["m.urgente"] --> Urgencia de la adopción de la mascota
			$row["m.imagenPerfil"] --> Imagen de perfil de la mascota
			$row["r.nombre"] --> Nombre de la raza de la mascota
			$row["p.nombre"] --> Nombre de la protectora de la mascota
			$row["c.comunidad"] --> Nombre de la comunidad de la mascota
			*/

			//Codigo para poner los diferentes animales, tenemos un cont para ir dividiendo de 4 en 4
			if($cont == 0){
			    echo "<div class=container>
      				<div class=row>";
		    }
		    //Diferencia si es urgente o no para poder printearlo
		    if(strcmp($row[$urgMascota],"Si")==0)
				echo "<div class=col-xl-3 col-lg-4 col-md-6 col-sm-12 card id=pruebaUrgente style=width: 20rem; onclick=frankmodal(".$row[$idMascota].")>
		          <img class=card-img-top src=".$row[$imgPerfilMascota]." alt=Card image cap>
		          <p><b>¡URGENTE!</b></p> 
		          <div class=card-block>
		            <h4 class=card-title style=color:#F88425;>".$row[$nombreMascota]."</h4>
		            <p class=card-text><img src=images/ubicacion.png width=25px height=25px alt=iconoUbicacion> <b>".$row[$nombreComunidad]."</b></br>
		            ".$row[$edadMascota]." ".$row[$uEdadMAscota]." · ".$row[$sexoMascota]." · ".$row[$tamMascota]." · ".$row[$nombreRaza]."</br>
		            <img src=images/caseta.png width=25px height=25px alt=iconoUbicacion> <u style = color:#F88425;>".$row[$nombreProtectora]."</u>
		          </div>
		        </div>";

		    else
				echo "<div class=col-xl-3 col-lg-4 col-md-6 col-sm-12 card id=pruebaUrgente style=width: 20rem; onclick=frankmodal(".$row[$idMascota].")>
		          <img class=card-img-top src=".$row[$imgPerfilMascota]." alt=Card image cap>
		          <div class=card-block>
		            <h4 class=card-title style=color:#F88425;>".$row[$nombreMascota]."</h4>
		            <p class=card-text><img src=images/ubicacion.png width=25px height=25px alt=iconoUbicacion> <b>".$row[$nombreComunidad]."</b></br>
		            ".$row[$edadMascota]." ".$row[$uEdadMAscota]." · ".$row[$sexoMascota]." · ".$row[$tamMascota]." · ".$row[$nombreRaza]."</br>
		            <img src=images/caseta.png width=25px height=25px alt=iconoUbicacion> <u style = color:#F88425;>".$row[$nombreProtectora]."</u>
		          </div>
		        </div>";

		        $cont++;
		    if($cont == 4 or $num_filas == 1){
		    	 echo"</div>
	   			 </div></br></br>";
		    	$cont = 0;
		    }

		    $num_filas--;
		    //Hasta aqui

		}
	} else {
		echo "Algo ha salido mal :C";
	}
	$conn->close(); //Cerrar la conexión
	?>
