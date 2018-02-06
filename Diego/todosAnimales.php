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
	//Coger todas las mascotas
	$sql = "SELECT * FROM mascota";
	$result = mysqli_query($conn, $sql);
	$cont = 0;

	//Saber el numero de mascotas
	$sql2 = "SELECT COUNT(*) FROM mascota";
	$result2 = mysqli_query($conn, $sql2);
	$contSQL = mysqli_fetch_row($result2);
	$num_filas = $contSQL[0];


	//Variables BBDD
	$idMascota = "idMascota";
	$imagen = "imagen";
	$nombre = "nombre";
	$edad = "edat";
	$unidadEdad = "unidadEdad";
	$sexo = "sexo";
	$tamaño = "tamaño";
	if ($num_filas > 0) {
		while ($line = mysqli_fetch_array($result)) {
		    if($cont == 0){
		    echo "<div class=container>
      				<div class=row>";
		    }
		    echo "<div class=col-xl-3 col-lg-4 col-md-6 col-sm-12 card style=width: 20rem; onclick=frankmodal(".$line[$idMascota].")>
	          <img class=card-img-top src=".$line[$imagen]." alt=Card image cap>
	          <div class=card-block>
	            <h4 class=card-title>".$line[$nombre]."</h4>
	            <p class=card-text>".$line[$edad]." años · ".$line[$sexo]." · ".$line[$tamaño]."</p>
	          </div>
	        </div>";
		    
		    if($cont == 3 or $num_filas == 1){
		    	 echo"</div>
	   			 </div>";
		    	$cont = 0;
		    }

		    $num_filas--;
		}
	}

	$conn->close();
?>