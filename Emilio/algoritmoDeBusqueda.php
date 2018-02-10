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
	$sqlCount = "SELECT count(*) FROM mascota AS m JOIN protectora AS p ON m.idProtectora = p.idProtectora JOIN comunidades AS c ON p.comunidad = c.idComunidad JOIN raza AS r ON m.raza = r.idRaza " .$sql; //Número de regristros que devuelve la consulta
	$sql = "SELECT * FROM mascota AS m JOIN protectora AS p ON m.idProtectora = p.idProtectora JOIN comunidades AS c ON p.comunidad = c.idComunidad JOIN raza AS r ON m.raza = r.idRaza " .$sql; //Consulta final
	$result = mysqli_query($conn, $sql); //Ejecución de la consulta final
	
	$resultCount = mysqli_query($conn, $sqlCount); //
	
	if ($resultCount->num_rows > 0) {
		while($rowCount = $resultCount->fetch_assoc()) {
			// Código para representar visualmente el número de regristros que devuelve la consulta, utilizar la variable $rowCount["count(*)"]
		}
	} else {
		echo "Algo ha salido mal :C";
	}
	
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
		}
	} else {
		echo "Algo ha salido mal :C";
	}
	$conn->close();
	?>
